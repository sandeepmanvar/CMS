<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('type' => 'general', 'name' => 'company_name', 'value' => 'Your Company Name', 'created_at' => now()),
            array('type' => 'general', 'name' => 'email_address', 'value' => 'admin@example.com','created_at' => now()),
            array('type' => 'general', 'name' => 'maintenance_mode', 'value' => 'N','created_at' => now()),
            array('type' => 'general', 'name' => 'maintenance_mode_message', 'value' => 'We are currently perfoming maintenance and will be back shortly.','created_at' => now()),
            array('type' => 'localisation', 'name' => 'dateformat', 'value' => 'DD/MM/YYYY', 'created_at' => now()),
            array('type' => 'localisation', 'name' => 'client_dateformat', 'value' => '','created_at' => now()),
            array('type' => 'localisation', 'name' => 'language', 'value' => 'english','created_at' => now()),
            array('type' => 'localisation', 'name' => 'allowuser_language', 'value' => 'Y','created_at' => now()),
            array('type' => 'mail', 'name' => 'mailtype', 'value' => 'mail','created_at' => now()),
            array('type' => 'mail', 'name' => 'smtp_port', 'value' => null,'created_at' => now()),
            array('type' => 'mail', 'name' => 'smtp_host', 'value' => null,'created_at' => now()),
            array('type' => 'mail', 'name' => 'smtp_username', 'value' => null,'created_at' => now()),
            array('type' => 'mail', 'name' => 'smtp_password', 'value' => null,'created_at' => now()),
            array('type' => 'mail', 'name' => 'smtp_ssl_type', 'value' => 'null','created_at' => now()),
            array('type' => 'mail', 'name' => 'signature', 'value' => null,'created_at' => now()),
            array('type' => 'mail', 'name' => 'fromname', 'value' => 'YourCompanyName','created_at' => now()),
            array('type' => 'mail', 'name' => 'fromemail', 'value' => 'admin@example.com','created_at' => now()),
            array('type' => 'security', 'name' => 'email_verification', 'value' => 'N','created_at' => now()),
            array('type' => 'security', 'name' => 'enable_captcha_form', 'value' => 'N','created_at' => now()),
            array('type' => 'security', 'name' => 'captcha_type', 'value' => 'default','created_at' => now()),
            array('type' => 'security', 'name' => 'recaptcha_sitekey', 'value' => '','created_at' => now()),
            array('type' => 'security', 'name' => 'recaptcha_secretkey', 'value' => '','created_at' => now()),
            array('type' => 'security', 'name' => 'hide_invisible_captcha_badge', 'value' => 'N','created_at' => now()),
            array('type' => 'security', 'name' => 'invisible_recaptcha_badge_style', 'value' => 'bottomright','created_at' => now()),
            array('type' => 'security', 'name' => 'invalid_login_ban_count', 'value' => '1','created_at' => now()),
            array('type' => 'security', 'name' => 'admin_login_lockout', 'value' => '30','created_at' => now()),
            array('type' => 'security', 'name' => 'disable_admin_pw_reset', 'value' => 'N','created_at' => now()),
            array('type' => 'signin', 'name' => 'facebook_signin', 'value' => 'N','created_at' => now()),
            array('type' => 'signin', 'name' => 'fb_app_id', 'value' => '','created_at' => now()),
            array('type' => 'signin', 'name' => 'fb_app_secret', 'value' => '','created_at' => now()),
            array('type' => 'signin', 'name' => 'google_signin', 'value' => 'N','created_at' => now()),
            array('type' => 'signin', 'name' => 'google_client_id', 'value' => '','created_at' => now()),
            array('type' => 'signin', 'name' => 'google_client_secret', 'value' => '','created_at' => now()),
        );
        Setting::insert($data);
    }
}
