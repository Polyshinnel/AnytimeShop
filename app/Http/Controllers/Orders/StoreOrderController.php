<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Telegram\TelegramController;
use App\Http\Requests\StoreOrderRequest;
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

    public function __construct(
        CommonCartService $commonCartService,
        CommonPromocodeService $promocodeService,
        CommonOrderService $commonOrderService,
        TelegramController $telegramController
    )
    {
        $this->commonCartService = $commonCartService;
        $this->promocodeService = $promocodeService;
        $this->commonOrderService = $commonOrderService;
        $this->telegramController = $telegramController;
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

        $deliveryArr = [
            'method_name' => $data['delivery'],
            'delivery_addr' => '220014 Минск, Филимонова 25Г-1000',
            'city' => 'Минск'
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
        $this->telegramController->sendOrder($result['message']);
        session('cart', []);
        return response()->json($result);
    }
}
