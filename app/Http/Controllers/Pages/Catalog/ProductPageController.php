<?php

namespace App\Http\Controllers\Pages\Catalog;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Product\CommonProductService;

class ProductPageController extends Controller
{
    private CommonProductService $commonProductService;
    private CommonCartService $commonCartService;

    public function __construct(CommonProductService $commonProductService, CommonCartService $commonCartService)
    {
        $this->commonProductService = $commonProductService;
        $this->commonCartService = $commonCartService;
    }

    public function __invoke(int $product_id)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }

        $products = $this->commonProductService->getProducts($product_id);
        $product = [];
        if($products) {
            $product = $products[0];
        }

        return view('Pages.ProductPage', ['product' => $product, 'cart' => $cartInfo]);
    }
}
