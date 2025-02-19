<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Models\NeedHelp;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class HelpPageController extends BasePageController
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
        $helpInfo = NeedHelp::all();
        return view('Pages.HelpPage', ['cart' => $cartInfo, 'pageInfo' => $pageInfo, 'helpInfo' => $helpInfo]);
    }
}
