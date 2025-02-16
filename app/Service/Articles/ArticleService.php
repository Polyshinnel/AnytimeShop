<?php

namespace App\Service\Articles;

use App\Models\Article;
use App\Models\News;

class ArticleService
{
    public function getArticles(): array
    {
        $rawArticles = Article::all();
        $articles = [];

        if(!$rawArticles->isEmpty()){
            foreach ($rawArticles as $items) {
                $descriptionShort = $items->description_short;
                if(mb_strlen($descriptionShort) > 80){
                    $descriptionShort = mb_substr($descriptionShort, 0, 75) . '...';
                }
                $link = $items->seo_url ?? $items->id;
                $articles[] = [
                    'id' => $items->id,
                    'title' => $items->title,
                    'description_short' => $descriptionShort,
                    'thumbnail' => $items->thumbnail,
                    'link' => '/articles/' . $link,
                ];
            }
        }
        return $articles;
    }

    public function getArticleItem(string|int $article): array
    {
        $articleItem = Article::where('seo_url', $article)->first();
        if(!$articleItem)
        {
            $articleItem = Article::find($article);
        }

        if($articleItem)
        {
            return $articleItem->toArray();
        }
        return [];
    }

    public function getArticleMeta(array $articlesItemArr): array
    {
        return [
            'canonical_url' => '/articles/' . $articlesItemArr['id'],
            'description' => $articlesItemArr['meta_description'],
            'og_image' => $articlesItemArr['thumbnail'],
            'title' => $articlesItemArr['meta_title']
        ];

    }
}
