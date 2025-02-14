<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Faq\FaqService;
use Illuminate\Http\Request;

class FaqPageController extends BasePageController
{
    private CommonCartService $commonCartService;
    private FaqService $faqService;

    public function __construct(CommonCartService $commonCartService, FaqService $faqService)
    {
        $this->commonCartService = $commonCartService;
        $this->faqService = $faqService;
    }

    public function __invoke(Request $request)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = $this->getPageInfo($request);
        $faq = $this->faqService->getFaqs();
        return view(
            'Pages.FAQPage',
            [
                'cart' => $cartInfo,
                'pageInfo' => $pageInfo,
                'faq' => $faq
            ]
        );
    }
}
