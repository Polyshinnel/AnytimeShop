<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Product\CommonProductService;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private CommonProductService $commonProductService;
    private CommonCartService $commonCartService;

    public function __construct(CommonProductService $commonProductService, CommonCartService $commonCartService)
    {
        $this->commonProductService = $commonProductService;
        $this->commonCartService = $commonCartService;
    }

    public function __invoke()
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $products = $this->commonProductService->getProducts();
        return view('Pages.HomePage', ['products' => $products, 'cart' => $cartInfo]);
    }
}
