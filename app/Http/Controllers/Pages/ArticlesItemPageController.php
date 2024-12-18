<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Service\Articles\ArticleService;
use App\Service\Cart\CommonCartService;
use App\Service\News\NewsService;

class ArticlesItemPageController extends Controller
{
    private CommonCartService $commonCartService;
    private ArticleService $articleService;

    public function __construct(CommonCartService $commonCartService, ArticleService $articleService)
    {
        $this->commonCartService = $commonCartService;
        $this->articleService = $articleService;
    }

    public function __invoke(int $id)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $articleItem = $this->articleService->getArticleItem($id);
        $pageInfo = $this->articleService->getArticleMeta($articleItem);
        return view('Pages.Articles-item',
            [
                'pageInfo' => $pageInfo,
                'cart' => $cartInfo,
                'pageTitle' => 'Статьи',
                'article' => $articleItem,
            ]);
    }
}
