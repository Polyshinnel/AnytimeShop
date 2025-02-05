<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCommonDelivery;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Traits\Resource\ResourceWithParent;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<ProductCommonDelivery>
 */
class ProductCommonDeliveryResource extends ModelResource
{
    use ResourceWithParent;

    protected SortDirection $sortDirection = SortDirection::ASC;

    protected function getParentResourceClassName(): string
    {
        return ProductCommonDeliveryTypeResource::class;
    }

    protected function getParentRelationName(): string
    {
        return 'delivery';
    }

    protected string $model = ProductCommonDelivery::class;

    protected string $title = 'ProductCommonDeliveries';

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
                BelongsTo::make('Тип доставка', 'delivery', resource: ProductCommonDeliveryTypeResource::class),
                Text::make('Текст', 'text')
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
     * @param ProductCommonDelivery $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
