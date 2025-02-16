<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Preview;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Товары';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name'),
            Text::make('Цена', 'price'),
            Text::make('Новая цена', 'new_price'),
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
                Text::make('Название', 'name'),
                Text::make('Цена', 'price'),
                Text::make('Новая цена', 'new_price')->nullable(),
                Text::make('Meta Title', 'meta_title')->nullable(),
                Textarea::make('Meta Description', 'meta_description')->nullable(),
                Text::make('Seo url', 'seo_url')->nullable(),
                TinyMce::make('Описание', 'description'),
                HasMany::make('Изображения', 'images', resource: ProductImagesResource::class)
                ->fields([
                    ID::make('ID', 'id'),
                    Text::make('Сортировка', 'sort_order'),
                    Preview::make('Изображение', 'img', static fn($image)=> "/storage/$image->img")
                    ->image()
                ])
                ->creatable(),
                HasMany::make('Комплектация', 'complectation', resource: ProductComplectationResource::class)
                ->fields([
                    ID::make('ID', 'id'),
                    Text::make('Текст', 'complect_text')
                ])
                ->creatable()
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            Text::make('Название', 'name'),
            Text::make('Цена', 'price'),
            Text::make('Новая цена', 'new_price'),
            Text::make('Meta Title', 'meta_title'),
            Text::make('Meta Description', 'meta_description'),
            Text::make('Seo url', 'seo_url'),
        ];
    }

    /**
     * @param Product $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
