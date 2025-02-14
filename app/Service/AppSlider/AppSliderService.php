<?php

namespace App\Service\AppSlider;

use App\Models\AppSlider;

class AppSliderService
{
    public function getSlides(): array
    {
        $appSliders = AppSlider::all();
        $slides = [];
        $active = true;
        foreach ($appSliders as $appSlider) {
            $slides[] = [
                'title_block_1' => $appSlider->title_block_1,
                'text_block_1' => $appSlider->text_block_1,
                'title_block_2' => $appSlider->title_block_1,
                'text_block_2' => $appSlider->text_block_1,
                'img' => $appSlider->img,
                'img_alt' => $appSlider->img_alt,
                'img_title' => $appSlider->img_title,
                'active' => $active,
            ];
            $active = false;
        }
        return $slides;
    }
}
