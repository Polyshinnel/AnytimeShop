<?php

namespace App\Http\Controllers\Pages\Catalog;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Product\AdditionalProductService;
use App\Service\Product\CommonProductService;
use Illuminate\Http\Request;


class CatalogPageController extends BasePageController
{
    private CommonProductService $commonProductService;
    private CommonCartService $commonCartService;

    private AdditionalProductService $additionalProductService;

    public function __construct(CommonProductService $commonProductService, CommonCartService $commonCartService, AdditionalProductService $additionalProductService)
    {
        $this->commonProductService = $commonProductService;
        $this->commonCartService = $commonCartService;
        $this->additionalProductService = $additionalProductService;
    }

    public function __invoke(Request $request)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = $this->getPageInfo($request);
        $products = $this->commonProductService->getProducts();
        $additionalProducts = $this->additionalProductService->getAdditionalProducts();

        return view('Pages.CatalogPage', [
            'products' => $products,
            'cart' => $cartInfo,
            'pageInfo' => $pageInfo,
            'additional_products' => $additionalProducts
        ]);
    }
}
