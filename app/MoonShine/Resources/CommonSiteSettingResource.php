<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommonSettings;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<CommonSettings>
 */
class CommonSiteSettingResource extends ModelResource
{
    protected string $model = CommonSettings::class;

    protected string $title = 'CommonSiteSettings';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название настройки', 'name'),
            Text::make('Тип настройки', 'type'),
            Text::make('Значение', 'value'),
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
                Text::make('Название настройки', 'name'),
                Text::make('Тип настройки', 'type'),
                Text::make('Значение', 'value'),
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
            Text::make('Название настройки', 'name'),
            Text::make('Тип настройки', 'type'),
            Text::make('Значение', 'value'),
        ];
    }

    /**
     * @param CommonSiteSetting $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
