<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\News\NewsService;
use Illuminate\Http\Request;

class NewsItemPageController extends Controller
{
    private CommonCartService $commonCartService;
    private NewsService $newsService;

    public function __construct(CommonCartService $commonCartService, NewsService $newsService)
    {
        $this->commonCartService = $commonCartService;
        $this->newsService = $newsService;
    }

    public function __invoke(int $id)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $newsItem = $this->newsService->getNewsItem($id);
        $pageInfo = $this->newsService->getNewsMeta($newsItem);
        return view('Pages.Articles-item',
            [
                'pageInfo' => $pageInfo,
                'cart' => $cartInfo,
                'pageTitle' => 'Новости',
                'article' => $newsItem,
            ]);
    }
}
