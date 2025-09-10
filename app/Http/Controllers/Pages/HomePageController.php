<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Service\AppSlider\AppSliderService;
use App\Service\Cart\CommonCartService;
use App\Service\Product\AdditionalProductService;
use App\Service\Product\CommonProductService;
use App\Service\Reviews\ReviewService;
use Illuminate\Http\Request;

class HomePageController extends BasePageController
{
    private CommonProductService $commonProductService;
    private CommonCartService $commonCartService;
    private ReviewService $reviewService;
    private AppSliderService $appSliderService;
    private AdditionalProductService $additionalProductService;

    public function __construct(
        CommonProductService $commonProductService,
        CommonCartService $commonCartService,
        ReviewService $reviewService,
        AppSliderService $appSliderService,
        AdditionalProductService $additionalProductService
    )
    {
        $this->commonProductService = $commonProductService;
        $this->commonCartService = $commonCartService;
        $this->reviewService = $reviewService;
        $this->appSliderService = $appSliderService;
        $this->additionalProductService = $additionalProductService;
    }

    public function __invoke(Request $request)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $products = $this->commonProductService->getProducts();
        $pageInfo = $this->getPageInfo($request);
        $reviews = $this->reviewService->getReviews();
        $slides = $this->appSliderService->getSlides();
        $additionalProducts = $this->additionalProductService->getAdditionalProducts();

        return view(
            'Pages.HomePage',
            [
                'products' => $products,
                'cart' => $cartInfo,
                'pageInfo' => $pageInfo,
                'reviews' => $reviews,
                'slides' => $slides,
                'additional_products' => $additionalProducts
            ]
        );
    }
}
