<?php

namespace App\Http\Controllers\Pages\Catalog;

use App\Http\Controllers\Controller;
use App\Service\Product\CommonProductService;

class ProductPageController extends Controller
{
    private CommonProductService $commonProductService;

    public function __construct(CommonProductService $commonProductService)
    {
        $this->commonProductService = $commonProductService;
    }

    public function __invoke(int $product_id)
    {
        $products = $this->commonProductService->getProducts($product_id);
        $product = [];
        if($products) {
            $product = $products[0];
        }

        return view('Pages.ProductPage', ['product' => $product]);
    }
}
