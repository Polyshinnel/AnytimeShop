<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\AppSlider;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Preview;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<AppSlider>
 */
class AppSliderResource extends ModelResource
{
    protected string $model = AppSlider::class;

    protected string $title = 'Слайдер приложения';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Текст', 'title_block_1'),
            Preview::make('Слайд', 'img', static fn($image)=> "/storage/$image->img")
                ->image(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Заголовок блока 1', 'title_block_1'),
                Textarea::make('Текст блока 1', 'text_block_1'),
                Text::make('Заголовок блока 2', 'title_block_2'),
                Textarea::make('Текст блока 2', 'text_block_2'),
                Image::make('Слайд', 'img')->dir('images/app-slider'),
                Text::make('Img alt', 'img_alt'),
                Text::make('Img title', 'img_title'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param AppSlider $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
