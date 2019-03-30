<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        config([
            'settings' => Setting::all()
            ->keyBy('name')
            ->groupBy('type')
            ->transform(function($setting){
                return $setting->keyBy('name')
                ->transform(function($sub_setting){
                    return $sub_setting->value;
                })
                ->toArray();
            })
            ->toArray()
        ]);
        
        config(['app.name' => config('settings.general.company_name')]);
        config(['app.url' => config('settings.general.domain')]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
