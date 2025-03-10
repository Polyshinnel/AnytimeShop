<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Payment;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class DeliveryPageController extends BasePageController
{
    private CommonCartService $commonCartService;

    public function __construct(CommonCartService $commonCartService)
    {
        $this->commonCartService = $commonCartService;
    }

    public function __invoke(Request $request)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = $this->getPageInfo($request);
        $paymentInfo = Payment::all();
        $deliveryInfo = Delivery::all();
        return view('Pages.DeliveryPage', [
            'cart' => $cartInfo,
            'pageInfo' => $pageInfo,
            'paymentInfo' => $paymentInfo,
            'deliveryInfo' => $deliveryInfo
        ]);
    }
}
