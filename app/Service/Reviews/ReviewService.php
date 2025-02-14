<?php

namespace App\Service\Reviews;

use App\Models\Review;

class ReviewService
{
    public function getReviews(): array
    {
        $formattedReviews = [];
        $reviews = Review::all();
        if(!$reviews->isEmpty()) {
            foreach($reviews as $review) {
                $rating = $review->rating;
                $emptyStar = 5 - $rating;
                $starArr = [];

                for($i = 0; $i < $rating; $i++) {
                    $starArr[] = 'full-star';
                }

                if($emptyStar > 0) {
                    for($i = 0; $i < $emptyStar; $i++) {
                        $starArr[] = 'empty-star';
                    }
                }

                $formattedReviews[] = [
                    'avatar' => $review->avatar,
                    'name' => $review->name,
                    'text' => $review->text,
                    'stars' => $starArr
                ];
            }
        }

        return $formattedReviews;
    }
}
