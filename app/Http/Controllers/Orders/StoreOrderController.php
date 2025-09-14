<?php

namespace App\Http\Controllers\Orders;

use App\Api\BitrixApi;
use App\Api\WebpayApi;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Telegram\TelegramController;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Product;
use App\Service\Cart\CommonCartService;
use App\Service\Order\CommonOrderService;
use App\Service\Promocode\CommonPromocodeService;
use Illuminate\Http\Request;

class StoreOrderController extends Controller
{
    private CommonCartService $commonCartService;
    private CommonPromocodeService $promocodeService;
    private CommonOrderService $commonOrderService;
    private TelegramController $telegramController;
    private WebpayApi $webpayApi;
    private BitrixApi $bitrixApi;

    public function __construct(
        CommonCartService $commonCartService,
        CommonPromocodeService $promocodeService,
        CommonOrderService $commonOrderService,
        TelegramController $telegramController,
        WebpayApi $webpayApi,
        BitrixApi $bitrixApi
    )
    {
        $this->commonCartService = $commonCartService;
        $this->promocodeService = $promocodeService;
        $this->commonOrderService = $commonOrderService;
        $this->telegramController = $telegramController;
        $this->webpayApi = $webpayApi;
        $this->bitrixApi = $bitrixApi;
    }


    public function __invoke(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $message = '';
        $promocode = '';
        if(isset($data['message'])) {
            $message = $data['message'];
        }
        if(isset($data['promocode'])) {
            $promocode = $data['promocode'];
        }
        $cart = session('cart');
        $cartInfo = $this->commonCartService->getTotalCartInfo($cart);

        $total = $cartInfo['total'];
        $promocodeArr = [];


        if($promocode) {
            $promocodeData = $this->promocodeService->getPromocodeData($promocode, $total);
            if($promocodeData['err'] == 'none')
            {
                $total = $promocodeData['total_sum'];
                $usePromocode = true;
                $resultPromocode = $promocode;
                $promocodeArr = [
                    'use_promocode' => true,
                    'promocode' => $promocode
                ];
            }
        }

        $deliveryAddr = '220014 Минск, Филимонова 25Г-1000';
        $city = 'Минск';

        if(isset($data['delivery_addr'])) {
            $deliveryAddr = $data['delivery_addr'];
            $city = $data['delivery_city'];
        }

        $deliveryArr = [
            'method_name' => $data['delivery'],
            'delivery_addr' => $deliveryAddr,
            'city' => $city
        ];


        $result = $this->commonOrderService->createOrder(
            $cartInfo,
            $data['name'],
            $data['phone'],
            $data['email'],
            $message,
            $total,
            $promocodeArr,
            $deliveryArr
        );


        $createArrProducts = [];

        foreach ($cartInfo['products'] as $product)
        {
            $productData = Product::find($product['id']);

            $createArrProducts[] = [
                'name' => $productData->name,
                'price' => $productData->new_price ?? $productData->price,
                'quantity' => $product['quantity']
            ];
        }

        $createOrderArr = [
            'orderId' => $result['order_id'],
            'products' => $createArrProducts,
            'shippingPrice' => 0,
            'discountPrice' => 0,
            'customerName' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ];

        $orderData = $this->webpayApi->createOrder($createOrderArr);

        $this->telegramController->sendOrder($result['message']);



        if(isset($orderData['error']))
        {
            session()->forget('cart');
        }
        
        return response()->json($orderData);
    }
}
