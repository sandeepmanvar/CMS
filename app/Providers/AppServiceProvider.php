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
        config(['mail.driver' => config('settings.mail.mailtype')]);
        config(['mail.host' => config('settings.mail.smtp_host')]);
        config(['mail.port' => config('settings.mail.smtp_port')]);
        config(['mail.encryption' => config('settings.mail.smtp_ssl_type')]);
        config(['mail.username' => config('settings.mail.smtp_username')]);
        config(['mail.password' => config('settings.mail.smtp_password')]);
        config(['mail.from.address' => config('settings.mail.from_email') == "" ? config('settings.general.email_address') : config('settings.mail.from_email')]);
        config(['mail.from.name' => config('settings.mail.from_name') == "" ? config('settings.general.company_name') : config('settings.mail.from_name')]);
        config(['captcha.siteKey' => config('settings.security.recaptcha_sitekey')]);
        config(['captcha.secretKey' => config('settings.security.recaptcha_secretkey')]);
        config(['captcha.options.hideBadge' => config('settings.security.hide_invisible_captcha_badge') == 'N' ? false : true]);
        config(['captcha.options.dataBadge' => config('settings.security.invisible_recaptcha_badge_style')]);
        
        //dd(config('captcha'));
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
