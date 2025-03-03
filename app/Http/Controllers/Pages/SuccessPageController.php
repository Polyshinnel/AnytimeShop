<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class SuccessPageController extends BasePageController
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
        $pageInfo = SiteSettings::where('active', true)->first();
        return view('Pages.SuccessOrder', ['cart' => $cartInfo, 'pageInfo' => $pageInfo]);
    }
}
