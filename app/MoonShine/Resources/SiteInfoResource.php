<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\SiteInfo;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<SiteInfo>
 */
class SiteInfoResource extends ModelResource
{
    protected string $model = SiteInfo::class;

    protected string $title = 'SEO Site';

    protected ?string $alias = 'siteInfo';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Url', 'url'),
            Text::make('Title', 'title'),
            Text::make('Description', 'description'),
            Text::make('h1', 'h1')
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
                Text::make('Url', 'url'),
                Text::make('Title', 'title'),
                Text::make('Description', 'description'),
                Text::make('h1', 'h1')
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
            Text::make('Url', 'url'),
            Text::make('Title', 'title'),
            Text::make('Description', 'description'),
            Text::make('h1', 'h1')
        ];
    }

    /**
     * @param SiteInfo $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
