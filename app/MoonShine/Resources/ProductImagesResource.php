<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Traits\Resource\ResourceWithParent;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<ProductImages>
 */
class ProductImagesResource extends ModelResource
{
    use ResourceWithParent;

    protected string $model = ProductImages::class;

    protected string $title = 'ProductImages';

    protected SortDirection $sortDirection = SortDirection::ASC;

    protected function getParentResourceClassName(): string
    {
        return ProductResource::class;
    }

    protected function getParentRelationName(): string
    {
        return 'product';
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
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
                BelongsTo::make('Ид товара', 'product', resource: ProductResource::class),
                Text::make('Порядок сортировки', 'sort_order'),
                Image::make('Изображение', 'img')
                    ->when(
                        $parentId = $this->getParentId(),
                        static fn($image): Image => $image->dir("images/products/$parentId")
                    ),
                Text::make('Img alt', 'alt_img'),
                Text::make('Img title', 'title_img'),
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
            Text::make('Порядок сортировки', 'sort_order'),
            Image::make('Изображение', 'img')
                ->when(
                    $parentId = $this->getParentId(),
                    static fn($image): Image => $image->dir("images/products/$parentId")
                ),
            Text::make('Img alt', 'alt_img'),
            Text::make('Img title', 'title_img'),
        ];
    }

    /**
     * @param ProductImages $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
