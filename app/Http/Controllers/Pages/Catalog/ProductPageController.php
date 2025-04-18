<?php

namespace App\Http\Controllers\Pages\Catalog;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
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

    public function __invoke(string|int $product)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }

        $products = $this->commonProductService->getProducts($product);
        $product = [];
        if($products) {
            $product = $products[0];
        }

        $pageInfo = SiteSettings::where('active', true)->first();
        $pageInfo['page_title'] = $product['meta_title'];
        $pageInfo['description'] = $product['meta_description'];

        return view('Pages.ProductPage', ['product' => $product, 'cart' => $cartInfo, 'pageInfo' => $pageInfo]);
    }
}
