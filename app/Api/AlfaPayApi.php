<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;
use App\Api\KzExchangeApi;
use App\Api\RuExchangeApi;

class AlfaPayApi
{
    private RuExchangeApi $ruExchangeApi;
    private KzExchangeApi $kzExchangeApi;

    public function __construct(RuExchangeApi $ruExchangeApi, KzExchangeApi $kzExchangeApi)
    {
        $this->ruExchangeApi = $ruExchangeApi;
        $this->kzExchangeApi = $kzExchangeApi;
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
    public function createOrder(array $orderData, string $country): array
    {
        $paymentUrl = config('alfapay.alfapay_url') . 'rest/register.do';
        $userName = config('alfapay.alfapay_login');
        $password = config('alfapay.alfapay_password');

        // Формируем номер заказа
        $orderNumber = 'ORDER_BY-' . $orderData['orderId'];

        // Вычисляем общую сумму
        $totalAmount = 0;
        foreach ($orderData['products'] as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $totalAmount = $totalAmount + $orderData['shippingPrice'] - $orderData['discountPrice'];

        // Конвертируем в белорусские рубли, если страна не Беларусь
        if($country == 'RU') {
            $currencyInfo = $this->ruExchangeApi->getExchange();
            if($currencyInfo && isset($currencyInfo['money'])) {
                $totalAmount = round($totalAmount / (float)$currencyInfo['money'], 2);
            }
        }

        if($country == 'KZ') {
            $currencyInfo = $this->kzExchangeApi->getExchange();
            if($currencyInfo && isset($currencyInfo['money'])) {
                $totalAmount = round($totalAmount / (float)$currencyInfo['money'], 2);
            }
        }

        // Конвертируем в копейки (умножаем на 100)
        $amountInKopecks = (int)round($totalAmount * 100);

        // Коды валют по странам (ISO 4217)
        $currencies = [
            'BY' => 933, // Беларусь - BYN (Белорусский рубль)
            'RU' => 643, // Россия - RUB (Российский рубль)
            'KZ' => 398, // Казахстан - KZT (Казахстанский тенге)
        ];

        $currency = $currencies[$country] ?? $currencies['BY'];
        // URL для возврата после оплаты
        $returnUrl = 'https://diabet-anytime.com/order/success';
        $failUrl = 'https://diabet-anytime.com/order/cancel';

        // Описание заказа
        $description = $orderData['description'] ?? 'Оплата заказа №' . $orderData['orderId'];

        // Формируем корзину товаров (orderBundle)
        $orderBundle = $this->buildOrderBundle($orderData, $country);

        // Формируем параметры запроса
        $requestParams = [
            'userName' => $userName,
            'password' => $password,
            'orderNumber' => $orderNumber,
            'amount' => $amountInKopecks,
            'currency' => 933,
            'returnUrl' => $returnUrl,
            'failUrl' => $failUrl,
            'description' => $description,
            'email' => $orderData['email'] ?? null,
            'language' => $orderData['language'] ?? 'ru',
            'orderBundle' => json_encode($orderBundle, JSON_UNESCAPED_UNICODE),
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

        // Отправляем запрос используя стандартный Laravel HTTP фасад (form-data)
        $response = Http::asForm()->post($paymentUrl, $requestParams);

        // Проверяем успешность запроса
        if (!$response->successful()) {
            return [
                'errorCode' => 'REQUEST_ERROR',
                'errorMessage' => 'Ошибка при выполнении запроса к платежной системе',
                'formUrl' => null,
                'orderId' => null,
            ];
        }

        // Получаем данные ответа
        $responseData = $response->json();

        // Если ответ не является массивом или пустой
        if (!is_array($responseData)) {
            return [
                'errorCode' => 'REQUEST_ERROR',
                'errorMessage' => 'Ошибка при выполнении запроса к платежной системе',
                'formUrl' => null,
                'orderId' => null,
            ];
        }


        return [ 
            'orderId' => $responseData['orderId'],
            'redirectUrl' => $responseData['formUrl'],
        ];
    }

    /**
     * Формирует корзину товаров (orderBundle) для платежной системы
     *
     * @param array $orderData Данные заказа
     * @return string JSON-строка с корзиной товаров
     */
    private function buildOrderBundle(array $orderData, string $country): array
    {
        $items = [];
        $positionId = 1;

        // Формируем товары из корзины
        foreach ($orderData['products'] as $item) {
            $itemPrice = $item['price'];
            $itemAmount = $item['price'] * $item['quantity'];
            
            // Конвертируем в белорусские рубли, если страна не Беларусь
            if($country == 'RU') {
                $currencyInfo = $this->ruExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $itemPrice = round($itemPrice / (float)$currencyInfo['money'], 2);
                    $itemAmount = round($itemAmount / (float)$currencyInfo['money'], 2);
                }
            }
            
            if($country == 'KZ') {
                $currencyInfo = $this->kzExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $itemPrice = round($itemPrice / (float)$currencyInfo['money'], 2);
                    $itemAmount = round($itemAmount / (float)$currencyInfo['money'], 2);
                }
            }
            
            // Конвертируем в копейки (умножаем на 100)
            $itemPriceInKopecks = (int)round($itemPrice * 100);
            $itemAmountInKopecks = (int)round($itemAmount * 100);

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
            $shippingPrice = $orderData['shippingPrice'];
            
            // Конвертируем в белорусские рубли, если страна не Беларусь
            if($country == 'RU') {
                $currencyInfo = $this->ruExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $shippingPrice = round($shippingPrice / (float)$currencyInfo['money'], 2);
                }
            }
            
            if($country == 'KZ') {
                $currencyInfo = $this->kzExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $shippingPrice = round($shippingPrice / (float)$currencyInfo['money'], 2);
                }
            }
            
            // Конвертируем в копейки (умножаем на 100)
            $shippingPriceInKopecks = (int)round($shippingPrice * 100);
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
            $discountPrice = $orderData['discountPrice'];
            
            // Конвертируем в белорусские рубли, если страна не Беларусь
            if($country == 'RU') {
                $currencyInfo = $this->ruExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $discountPrice = round($discountPrice / (float)$currencyInfo['money'], 2);
                }
            }
            
            if($country == 'KZ') {
                $currencyInfo = $this->kzExchangeApi->getExchange();
                if($currencyInfo && isset($currencyInfo['money'])) {
                    $discountPrice = round($discountPrice / (float)$currencyInfo['money'], 2);
                }
            }
            
            // Конвертируем в копейки (умножаем на 100)
            $discountPriceInKopecks = (int)round($discountPrice * 100);
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

        return $orderBundle;
    }
}
