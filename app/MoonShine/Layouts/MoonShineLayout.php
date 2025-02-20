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
use App\MoonShine\Resources\PrivatePolicyResource;
use App\MoonShine\Resources\PaymentResource;
use App\MoonShine\Resources\NeedHelpResource;
use App\MoonShine\Resources\DeliveryResource;
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

            MenuGroup::make('Главная страница', [
                MenuItem::make('Слайдер приложения', AppSliderResource::class),
                MenuItem::make('Отзывы', ReviewResource::class),
            ]),

            MenuGroup::make('Seo и реклама', [
                MenuItem::make('SEO Site', SiteInfoResource::class),
                MenuItem::make('Промокоды', PromocodesResource::class),
            ]),

            MenuGroup::make('Каталог', [
                MenuItem::make('Товары', ProductResource::class),
                MenuItem::make('Гарантия', ProductCommonWarrantyResource::class),
                MenuItem::make('Доставка', ProductCommonDeliveryTypeResource::class),
                MenuItem::make('Общие характеристики', ProductCommonCharsResource::class),
            ]),

            MenuGroup::make('Контент', [
                MenuItem::make('Новости', NewsResource::class),
                MenuItem::make('Статьи', ArticleResource::class),
                MenuItem::make('FAQ', FaqGroupsResource::class),
                MenuItem::make('Оплата', PaymentResource::class),
                MenuItem::make('Доставка', DeliveryResource::class),
                MenuItem::make('Нужна помощь', NeedHelpResource::class),
                MenuItem::make('Политика конфиденциальности', PrivatePolicyResource::class),
            ]),

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
