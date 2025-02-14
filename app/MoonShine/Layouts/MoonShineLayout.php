<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Pages\Dashboard;
use App\MoonShine\Resources\AppSliderResource;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\PromocodesResource;
use App\MoonShine\Resources\SiteInfoResource;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\ProductImagesResource;
use App\MoonShine\Resources\ProductComplectationResource;
use App\MoonShine\Resources\ProductCommonWarrantyResource;
use App\MoonShine\Resources\ProductCommonDeliveryTypeResource;
use App\MoonShine\Resources\ProductCommonDeliveryResource;
use App\MoonShine\Resources\ProductCommonCharsResource;
use App\MoonShine\Resources\SiteSettingsResource;
use App\MoonShine\Resources\FaqGroupsResource;
use App\MoonShine\Resources\FaqResource;
use App\MoonShine\Resources\ReviewResource;
use App\MoonShine\Resources\CommonSiteSettingResource;
final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('Дашборд', Dashboard::class),
            MenuItem::make('SEO Site', SiteInfoResource::class),
            MenuGroup::make('Каталог', [
                MenuItem::make('Товары', ProductResource::class),
                MenuItem::make('Гарантия', ProductCommonWarrantyResource::class),
                MenuItem::make('Доставка', ProductCommonDeliveryTypeResource::class),
                MenuItem::make('Общие характеристики', ProductCommonCharsResource::class),
            ]),
            MenuItem::make('Новости', NewsResource::class),
            MenuItem::make('Статьи', ArticleResource::class),
            MenuItem::make('FAQ', FaqGroupsResource::class),
            MenuItem::make('Слайдер приложения', AppSliderResource::class),
            MenuItem::make('Отзывы', ReviewResource::class),
            MenuItem::make('Промокоды', PromocodesResource::class),

            MenuGroup::make('Настройки сайта', [
                MenuItem::make('Настройки валют и форматов', SiteSettingsResource::class),
                MenuItem::make('Общие настройки сайта', CommonSiteSettingResource::class),
            ]),
            ...parent::menu(),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
