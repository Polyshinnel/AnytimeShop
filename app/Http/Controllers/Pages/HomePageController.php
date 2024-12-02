<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Service\Product\CommonProductService;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private CommonProductService $commonProductService;

    public function __construct(CommonProductService $commonProductService)
    {
        $this->commonProductService = $commonProductService;
    }

    public function __invoke()
    {
        $products = $this->commonProductService->getProducts();
        return view('Pages.HomePage', ['products' => $products]);
    }
}
