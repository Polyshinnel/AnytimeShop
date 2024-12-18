<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\News\NewsService;
use Illuminate\Http\Request;

class NewsPageController extends BasePageController
{
    private CommonCartService $commonCartService;
    private NewsService $newsService;

    public function __construct(CommonCartService $commonCartService, NewsService $newsService)
    {
        $this->commonCartService = $commonCartService;
        $this->newsService = $newsService;
    }

    public function __invoke(Request $request)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = $this->getPageInfo($request);
        return view('Pages.Articles',
            [
                'pageInfo' => $pageInfo,
                'cart' => $cartInfo,
                'pageTitle' => 'Новости',
                'articles' => $this->newsService->getNews(),
            ]);
    }
}
