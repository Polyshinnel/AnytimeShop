<?php

namespace App\Http\Controllers\Pages\Catalog;

use App\Http\Controllers\Controller;
use App\Service\Product\CommonProductService;

class CatalogPageController extends Controller
{
    private CommonProductService $commonProductService;

    public function __construct(CommonProductService $commonProductService)
    {
        $this->commonProductService = $commonProductService;
    }

    public function __invoke()
    {
        $products = $this->commonProductService->getProducts();
        return view('Pages.CatalogPage', ['products' => $products]);
    }
}
