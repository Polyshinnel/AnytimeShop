<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Статьи';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title'),
            Text::make('Короткое описание', 'description_short'),
            Text::make('Дата публикации', 'created_at'),
            Text::make('Дата редактирования', 'updated_at'),
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
                Text::make('Название', 'title'),
                Textarea::make('Короткое описание', 'description_short'),
                Image::make('Обложка', 'thumbnail')->dir('images/articles'),
                TinyMce::make('Текст', 'text'),
                Text::make('Seo title', 'meta_title'),
                Text::make('Seo description', 'meta_description'),
                Text::make('Seo url', 'seo_url')->nullable(),
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
            Text::make('Название', 'title'),
            Textarea::make('Короткое описание', 'description_short'),
            Image::make('Обложка', 'thumbnail')->dir('images/articles'),
            Textarea::make('Текст', 'text'),
            Text::make('Seo title', 'meta_title'),
            Text::make('Seo description', 'meta_description'),
            Text::make('Seo url', 'seo_url'),
        ];
    }

    /**
     * @param Article $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
