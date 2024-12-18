<?php

namespace App\Service\News;

use App\Models\News;

class NewsService
{
    public function getNews(): array
    {
        $rawNews = News::all();
        $news = [];

        if(!$rawNews->isEmpty()){
            foreach ($rawNews as $news_item) {
                $descriptionShort = $news_item->description_short;
                if(mb_strlen($descriptionShort) > 80){
                    $descriptionShort = mb_substr($descriptionShort, 0, 75) . '...';
                }
                $news[] = [
                    'id' => $news_item->id,
                    'title' => $news_item->title,
                    'description_short' => $descriptionShort,
                    'thumbnail' => $news_item->thumbnail,
                    'link' => '/news/' . $news_item->id,
                ];
            }
        }
        return $news;
    }

    public function getNewsItem(int $id): array
    {
        $newsItem = News::find($id);
        if($newsItem)
        {
            return $newsItem->toArray();
        }
        return [];
    }

    public function getNewsMeta(array $newsItemArr): array
    {
        return [
            'canonical_url' => '/news/' . $newsItemArr['id'],
            'description' => $newsItemArr['meta_description'],
            'og_image' => $newsItemArr['thumbnail'],
            'title' => $newsItemArr['meta_title']
        ];

    }
}
