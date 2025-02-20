<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\NeedHelp;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<NeedHelp>
 */
class NeedHelpResource extends ModelResource
{
    protected string $model = NeedHelp::class;

    protected string $title = 'Страница нужна помощь';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название блока', 'name'),
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
                Text::make('Название блока', 'name'),
                Text::make('Заголовок', 'block_title'),
                Text::make('Подзаголовок', 'block_subtitle'),
                Text::make('Заголовок формы', 'form_title'),
                Text::make('Подзаголовок формы', 'form_subtitle')->nullable(),
                TinyMce::make('Содержимое', 'content'),
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
     * @param NeedHelp $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
