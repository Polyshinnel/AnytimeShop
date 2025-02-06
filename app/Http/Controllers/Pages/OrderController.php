<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Service\Cart\CommonCartService;

class OrderController extends Controller
{
    private CommonCartService $commonCartService;

    public function __construct(CommonCartService $commonCartService)
    {
        $this->commonCartService = $commonCartService;
    }

    public function __invoke()
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = SiteSettings::where('active', true)->first();
        return view('Pages.Order', ['cart' => $cartInfo, 'pageInfo' => $pageInfo]);
    }
}
