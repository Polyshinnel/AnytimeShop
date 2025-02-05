<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\SiteInfoResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\PromocodesResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\SertificateResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                SiteInfoResource::class,
                ProductResource::class,
                PromocodesResource::class,
                NewsResource::class,
                ArticleResource::class,
                SertificateResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
