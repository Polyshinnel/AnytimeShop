<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCommonDeliveryType;

use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Preview;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<ProductCommonDeliveryType>
 */
class ProductCommonDeliveryTypeResource extends ModelResource
{
    protected string $model = ProductCommonDeliveryType::class;

    protected string $title = 'Доставка';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Preview::make('Изображение', 'img', static fn($image)=>$image->img ? "/storage/$image->img": null)->image(),
            Text::make('Название', 'name'),
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
                Image::make('Изображение', 'img')->dir('images/delivery'),
                HasMany::make('Описания', 'deliveryItems', resource: ProductCommonDeliveryResource::class)
                ->fields([
                    ID::make(),
                    Text::make('text')
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
            ID::make(),
        ];
    }

    /**
     * @param ProductCommonDeliveryType $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
