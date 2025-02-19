<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Models\PrivatePolicy;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class PolicyPage extends BasePageController
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
        $policy = PrivatePolicy::first();
        return view('Pages.PolicyPage', ['cart' => $cartInfo, 'pageInfo' => $pageInfo, 'policy_data' => $policy]);
    }
}
