<?php

namespace Modules\Bank\Providers;

use Modules\Support\Traits\AddsAsset;
use Modules\Bank\Admin\SettingTabs;
use Illuminate\Support\ServiceProvider;
use Modules\Support\Traits\LoadsConfig;
use Modules\Admin\Ui\Facades\TabManager;

class SettingServiceProvider extends ServiceProvider
{
    use AddsAsset, LoadsConfig;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('banks', SettingTabs::class);

        $this->addAdminAssets('admin.banks.edit', ['admin.media.css', 'admin.media.js', 'admin.setting.js']);
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
