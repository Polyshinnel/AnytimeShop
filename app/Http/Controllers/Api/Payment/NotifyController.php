<?php

namespace App\Http\Controllers\Api\Payment;

use App\Api\BitrixApi;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    private BitrixApi $bitrixApi;

    public function __construct(BitrixApi $bitrixApi)
    {
        $this->bitrixApi = $bitrixApi;
    }

    public function __invoke(Request $request)
    {
        $orderId = $request->input('order_id');
        $siteOrderId = $request->input('site_order_id');
        $paymentStatus = $request->input('payment_type');

        $successPaymentStatusArr = [1, 4, 10, 23];
        if(in_array($paymentStatus, $successPaymentStatusArr)) {
            $siteOrderId = explode('-', $siteOrderId);
            $order = Order::find($siteOrderId[1]);
            $order->update(['payed' => 1]);

            $createBitrixDeal = [
                'title' => 'Новый заказ с сайта',
                'username' => $order->customer_name,
                'phone' => $order->customer_phone,
                'email' => $order->customer_email,
                'promocode' => $order->promocode,
                'comments' => $order->customer_comment
            ];

            $productsArr = [];

            $orderProducts = OrderDetail::where('order_id', $order->id)->get();
            foreach($orderProducts as $orderProduct) {
                $product = Product::find($orderProduct->product_id);
                $productsArr[] = [
                    'name' => $product->name,
                    'quantity' => $orderProduct->quantity,
                ];
            }

            $createBitrixDeal['products'] = $productsArr;

            $this->bitrixApi->createDeal($createBitrixDeal);

            return response()->json(
                [
                    'success' => true,
                    'payment_status' => $paymentStatus,
                    'site_order_id' => $siteOrderId[1]
                ]
            );
        }
        return response()->json(
            [
                'success' => false,
                'payment_status' => $paymentStatus,
                'site_order_id' => $siteOrderId[1]
            ]
        );
    }
}
