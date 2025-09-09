<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\SiteSettings;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<SiteSettings>
 */
class SiteSettingsResource extends ModelResource
{
    protected string $model = SiteSettings::class;

    protected string $title = 'Настройки сайта';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Валюта', 'currency'),
            Text::make('Формат телефона', 'number_format'),
            Text::make('Цена доставки', 'delivery_price'),
            Switcher::make('Обменник', 'exchange'),
            Text::make('Код валюты', 'currency_code'),
            Text::make('Количество денег', 'money_quantity'),
            Switcher::make('Включен', 'active')
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
                Text::make('Валюта', 'currency'),
                Text::make('Формат телефона', 'number_format'),
                Text::make('Цена доставки', 'delivery_price'),
                Switcher::make('Включен', 'active'),
                Switcher::make('Обменник', 'exchange'),
                Text::make('Код валюты', 'currency_code'),
                Text::make('Количество денег', 'money_quantity'),
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
     * @param SiteSettings $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
