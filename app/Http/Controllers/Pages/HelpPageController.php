<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class HelpPageController extends Controller
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
        return view('Pages.HelpPage', ['cart' => $cartInfo]);
    }
}