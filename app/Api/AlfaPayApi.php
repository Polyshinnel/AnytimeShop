<?php

namespace App\Api;

use App\Tools\RequestTool;

class AlfaPayApi
{
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->requestTool = $requestTool;
    }

    /**
     * Создает заказ в платежной системе Альфа Банк Беларуси
     *
     * @param array $orderData Массив с данными заказа, содержащий следующие ключи:
     *                         - orderId (string): ID заказа
     *                         - products (array): Массив товаров, где каждый товар содержит:
     *                           - name (string): Название товара
     *                           - quantity (int|float): Количество товара
     *                           - price (float): Цена за единицу товара
     *                         - shippingPrice (float): Стоимость доставки
     *                         - discountPrice (float): Сумма скидки
     *                         - customerName (string): Имя клиента
     *                         - email (string): Email клиента
     *                         - phone (string): Телефон клиента
     *                         - description (string, optional): Описание заказа
     *                         - ip (string, optional): IP-адрес покупателя
     *                         - language (string, optional): Язык в кодировке ISO 639-1 (по умолчанию 'ru')
     *                         - country (string, optional): Код страны для определения валюты ('BY', 'RU', 'KZ', по умолчанию 'BY')
     *
     * @return array Ответ от платежной системы Альфа Банк, содержащий:
     *               - errorCode (string): Код ошибки
     *               - errorMessage (string): Сообщение об ошибке
     *               - formUrl (string): URL для перенаправления на страницу оплаты
     *               - orderId (string): ID заказа в системе банка
     */
    public function createOrder(array $orderData, string $currency): array
    {
        $paymentUrl = config('alfapay.alfapay_url') . '/rest/register.do';
        $userName = config('alfapay.alfapay_login');
        $password = config('alfapay.alfapay_password');

        // Формируем номер заказа
        $orderNumber = 'ORDER_BY-' . $orderData['orderId'];

        // Вычисляем общую сумму в копейках
        $totalAmount = 0;
        foreach ($orderData['products'] as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $totalAmount = $totalAmount + $orderData['shippingPrice'] - $orderData['discountPrice'];
        
        // Конвертируем в копейки (умножаем на 100)
        $amountInKopecks = (int)round($totalAmount * 100);

        // Коды валют по странам (ISO 4217)
        $currencies = [
            'BY' => 933, // Беларусь - BYN (Белорусский рубль)
            'RU' => 643, // Россия - RUB (Российский рубль)
            'KZ' => 398, // Казахстан - KZT (Казахстанский тенге)
        ];

        $currency = $currencies[$currency] ?? $currencies['BY'];
        // URL для возврата после оплаты
        $returnUrl = 'https://diabet-anytime.com/order/success';
        $failUrl = 'https://diabet-anytime.com/order/cancel';

        // Описание заказа
        $description = $orderData['description'] ?? 'Оплата заказа №' . $orderData['orderId'];

        // Формируем корзину товаров (orderBundle)
        $orderBundle = $this->buildOrderBundle($orderData);

        // Формируем параметры запроса
        $requestParams = [
            'userName' => $userName,
            'password' => $password,
            'orderNumber' => $orderNumber,
            'amount' => $amountInKopecks,
            'currency' => $currency,
            'returnUrl' => $returnUrl,
            'failUrl' => $failUrl,
            'description' => $description,
            'email' => $orderData['email'] ?? null,
            'language' => $orderData['language'] ?? 'ru',
            'orderBundle' => $orderBundle,
        ];

        // Добавляем опциональные параметры, если они переданы
        if (isset($orderData['ip'])) {
            $requestParams['ip'] = $orderData['ip'];
        }

        if (isset($orderData['phone'])) {
            $requestParams['phone'] = $orderData['phone'];
        }

        // Удаляем null значения
        $requestParams = array_filter($requestParams, function ($value) {
            return $value !== null;
        });

        // Устанавливаем заголовки для JSON запроса
        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
        ];

        // Отправляем запрос
        $responseData = $this->requestTool->requestTool('POST', $paymentUrl, json_encode($requestParams), $headers);
        
        // Парсим ответ
        $response = json_decode($responseData['response'], true);
        
        if (!$response) {
            return [
                'errorCode' => 'REQUEST_ERROR',
                'errorMessage' => 'Ошибка при выполнении запроса к платежной системе',
                'formUrl' => null,
                'orderId' => null,
            ];
        }

        return $response;
    }

    /**
     * Формирует корзину товаров (orderBundle) для платежной системы
     *
     * @param array $orderData Данные заказа
     * @return string JSON-строка с корзиной товаров
     */
    private function buildOrderBundle(array $orderData): string
    {
        $items = [];
        $positionId = 1;

        // Формируем товары из корзины
        foreach ($orderData['products'] as $item) {
            $itemPriceInKopecks = (int)round($item['price'] * 100);
            $itemAmountInKopecks = (int)round($item['price'] * $item['quantity'] * 100);
            
            $productItem = [
                'positionId' => (string)$positionId,
                'name' => $item['name'],
                'quantity' => [
                    'value' => (float)$item['quantity'],
                    'measure' => 'psc'
                ],
                'itemAmount' => $itemAmountInKopecks,
                'itemCode' => $item['code'] ?? $item['id'] ?? (string)$positionId,
                'itemPrice' => (string)$itemPriceInKopecks,
            ];

            // Добавляем атрибуты товара, если они переданы
            if (isset($item['attributes']) && is_array($item['attributes'])) {
                $attributes = [];
                foreach ($item['attributes'] as $attrName => $attrValue) {
                    $attributes[] = [
                        'name' => $attrName,
                        'value' => (string)$attrValue
                    ];
                }
                if (!empty($attributes)) {
                    $productItem['itemAttributes'] = [
                        'attributes' => $attributes
                    ];
                }
            }

            $items[] = $productItem;
            $positionId++;
        }

        // Добавляем доставку как отдельную позицию, если она есть
        if (isset($orderData['shippingPrice']) && $orderData['shippingPrice'] > 0) {
            $shippingPriceInKopecks = (int)round($orderData['shippingPrice'] * 100);
            $items[] = [
                'positionId' => (string)$positionId,
                'name' => 'Стоимость доставки',
                'quantity' => [
                    'value' => 1.0,
                    'measure' => 'psc'
                ],
                'itemAmount' => $shippingPriceInKopecks,
                'itemCode' => 'shipping',
                'itemPrice' => (string)$shippingPriceInKopecks,
            ];
            $positionId++;
        }

        // Добавляем скидку как отдельную позицию, если она есть
        if (isset($orderData['discountPrice']) && $orderData['discountPrice'] > 0) {
            $discountPriceInKopecks = (int)round($orderData['discountPrice'] * 100);
            $items[] = [
                'positionId' => (string)$positionId,
                'name' => 'Скидка на товар',
                'quantity' => [
                    'value' => 1.0,
                    'measure' => 'psc'
                ],
                'itemAmount' => -$discountPriceInKopecks, // Отрицательная сумма для скидки
                'itemCode' => 'discount',
                'itemPrice' => (string)(-$discountPriceInKopecks),
            ];
        }

        $orderBundle = [
            'cartItems' => [
                'items' => $items
            ]
        ];

        // Добавляем информацию об агенте, если она передана
        if (isset($orderData['agent']) && is_array($orderData['agent'])) {
            $orderBundle['agent'] = $orderData['agent'];
        }

        return json_encode($orderBundle, JSON_UNESCAPED_UNICODE);
    }
}