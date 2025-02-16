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
                $link = $news_item->seo_url ?? $news_item->id;
                $news[] = [
                    'id' => $news_item->id,
                    'title' => $news_item->title,
                    'description_short' => $descriptionShort,
                    'thumbnail' => $news_item->thumbnail,
                    'link' => '/news/' . $link,
                ];
            }
        }
        return $news;
    }

    public function getNewsItem(string|int $news_item): array
    {
        $newsItem = News::where('seo_url', $news_item)->first();
        if(!$newsItem)
        {
            $newsItem = News::find($news_item);
        }
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
