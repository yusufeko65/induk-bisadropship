<?php

namespace Modules\Brand\Providers;

use Modules\Brand\Entities\Brand;
use Modules\Brand\Admin\BrandTabs;
use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Support\Traits\LoadsConfig;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Brand\Admin\ProductTabsExtender;

class BrandServiceProvider extends ServiceProvider
{
    use AddsAsset, LoadsConfig;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('options', OptionTabs::class);
        TabManager::extend('products', ProductTabsExtender::class);

        $this->addAdminAssets('admin.(options|products).(create|edit)', ['admin.option.css', 'admin.option.js']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadConfigs(['assets.php', 'permissions.php']);
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
