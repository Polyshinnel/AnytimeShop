<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Service\Articles\ArticleService;
use App\Service\Cart\CommonCartService;
use App\Service\News\NewsService;
use Illuminate\Http\Request;

class ArticlesPageController extends BasePageController
{
    private CommonCartService $commonCartService;
    private ArticleService $articleService;

    public function __construct(CommonCartService $commonCartService, ArticleService $articleService)
    {
        $this->commonCartService = $commonCartService;
        $this->articleService = $articleService;
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
                'articles' => $this->articleService->getArticles(),
            ]);
    }
}
