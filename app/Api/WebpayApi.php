<?php

namespace App\Api;

use App\Tools\RequestTool;
use Carbon\Carbon;

class WebpayApi
{
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->requestTool = $requestTool;
    }


    /**
     * Создает заказ в платежной системе Webpay
     *
     * @param array $orderData Массив с данными заказа, содержащий следующие ключи:
     *                         - orderId (string): ID заказа
     *                         - products (array): Массив товаров, где каждый товар содержит:
     *                           - name (string): Название товара
     *                           - quantity (int): Количество товара
     *                           - price (float): Цена за единицу товара
     *                         - shippingPrice (float): Стоимость доставки
     *                         - discountPrice (float): Сумма скидки
     *                         - customerName (string): Имя клиента
     *                         - email (string): Email клиента
     *                         - phone (string): Телефон клиента
     *
     * @return array Ответ от платежной системы Webpay
     *
     * @example
     * $orderData = [
     *     'wt' => 'a8770d78a00802f78e002b36353a6130=63546473535746484d335a7652555a5a62316c434c3239525757637657565133646c637a63465a505455493256324a4856584e31556d6f79564663765a58686e55477330526d4e71644567334d565a4653545a7354672c2c',
     *     'redirectUrl' => 'https://securesandbox.webpay.by?wt=a8770d78a00802f78e002b36353a6130=63546473535746484d335a7652555a5a62316c434c3239525757637657565133646c637a63465a505455493256324a4856584e31556d6f79564663765a58686e55477330526d4e71644567334d565a4653545a7354672c2c'
     * ];
     */
    public function createOrder($orderData): array
    {
        $paymentUrl = config('webpay.webpay_url');
        $webstoreId = config('webpay.webpay_store_id');
        $webstoreSecret = config('webpay.webpay_secret');

        $orderId = 'ORDER_BY-'.$orderData['orderId'];
        $currency = 'BYN';
        $webpayVersion = 2;
        $webpaySeed = random_int(100000, 999999);
        $webpayItemName = [];
        $webpayItemQuantity = [];
        $webpayItemPrice = [];

        $webpayTotal = 0;
        $webpayTest = 0;
        $wsbTax = 0;

        foreach ($orderData['products'] as $item) {
            $webpayItemName[] = $item['name'];
            $webpayItemQuantity[] = $item['quantity'];
            
            // Вычисляем цену без НДС
            // $priceWithoutTax = ($item['price'] * 100) / 110;
            // $priceWithoutTax = floor($priceWithoutTax * 100) / 100; // Округляем в меньшую сторону
            
            // $webpayItemPrice[] = (string)$priceWithoutTax;
            // $webpayTotal += $priceWithoutTax * $item['quantity'];

            // // Извлечение налога НДС из цены (НДС 10%)
            // $wsbTaxProduct = ($item['price'] * $item['quantity'] * 10) / 110;
            // // Округляем в меньшую сторону до 2 знаков после запятой
            // $wsbTaxProduct = floor($wsbTaxProduct * 100) / 100;
            // $wsbTax += $wsbTaxProduct;
            $webpayTotal += $item['price'] * $item['quantity'];
        }

        // Добавляем стоимость доставки, вычитаем скидку (налог уже включен в стоимость товаров)
        $webpayTotal = $webpayTotal + $orderData['shippingPrice'] - $orderData['discountPrice'];
        
        // $wsbTax = round($wsbTax, 2);

        // $webpayTotal = $webpayTotal + $wsbTax;
        // $webpayTotal = round($webpayTotal, 2);

        $webpaySign = $webpaySeed.$webstoreId.$orderId.$webpayTest.$currency.$webpayTotal.$webstoreSecret;
        $webpaySign = SHA1($webpaySign);

        $webpayReturnUrl = 'https://diabet-anytime.com/order/success';
        $webpayReturnUrlErr = 'https://diabet-anytime.com/order/cancel';

        $now = Carbon::now();
        $deliveryDate = $now->subDays(30);
        $formattedDate = $deliveryDate->locale('ru')->isoFormat('D MMMM YYYY года');
        $deliveryDate = "Доставка до $formattedDate";

        $createOrderArr = [
            'wsb_storeid' => $webstoreId,
            'wsb_order_num' => $orderId,
            'wsb_currency_id' => $currency,
            'wsb_version' => 2,
            'wsb_seed' => $webpaySeed,
            'wsb_test' => $webpayTest,
            'wsb_invoice_item_name' => $webpayItemName,
            'wsb_invoice_item_quantity' => $webpayItemQuantity,
            'wsb_invoice_item_price' => $webpayItemPrice,
            'wsb_total' => (string)$webpayTotal,
            'wsb_signature' => $webpaySign,
            'wsb_return_url' => $webpayReturnUrl,
            'wsb_cancel_return_url' => $webpayReturnUrlErr,
            'wsb_notify_url' => 'https://diabet-anytime.com/api/payment/notify',
            'wsb_customer_name' => $orderData['customerName'],
            'wsb_customer_address' => '220037, Беларусь, Минск, ул. Филимонова, 25Г, офис 1000',
            'wsb_service_date' => $deliveryDate,
            'wsb_shipping_name' => 'Стоимость доставки',
            'wsb_shipping_price' => (string)$orderData['shippingPrice'],
            "wsb_discount_name" => "Скидка на товар",
            'wsb_discount_price' => (string)$orderData['discountPrice'],
            'wsb_email' => $orderData['email'],
            'wsb_phone' => $orderData['phone'],
        ];

        $orderJson = json_encode($createOrderArr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        print_r($orderJson);

        // Устанавливаем заголовки для корректной передачи HTTP_REFERER и HTTP_ORIGIN
        $headers = [
            'Content-Type: application/json',
            'Referer: https://diabet-anytime.com/',
            'Origin: https://diabet-anytime.com/',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ];

        $responseData = $this->requestTool->requestTool('POST', $paymentUrl, json_encode($createOrderArr), $headers);
        return json_decode($responseData['response'], true);
    }
}
