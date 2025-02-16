<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
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

    public function __invoke(string|int $article)
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $articleItem = $this->articleService->getArticleItem($article);
        $siteInfo = SiteSettings::where('active', true)->first();
        $pageInfo = $this->articleService->getArticleMeta($articleItem);
        $pageInfo['currency'] = $siteInfo['currency'];
        $pageInfo['number_format'] = $siteInfo['number_format'];
        return view('Pages.Articles-item',
            [
                'pageInfo' => $pageInfo,
                'cart' => $cartInfo,
                'pageTitle' => 'Статьи',
                'article' => $articleItem,
            ]);
    }
}
