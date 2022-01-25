<?php

namespace Modules\Brand\Providers;

use Modules\Product\Entities\Product;
use Modules\Brand\Listeners\SaveProductBrands;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Product::saving(SaveProductBrands::class);
    }
}
