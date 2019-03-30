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
            array('type' => 'general', 'name' => 'domain', 'value' => 'http://www.example.com','created_at' => now()),
            array('type' => 'general', 'name' => 'maintenance_mode', 'value' => 'off','created_at' => now()),
            array('type' => 'general', 'name' => 'maintenance_mode_message', 'value' => 'We are currently perfoming maintenance and will be back shortly.','created_at' => now()),
        );
        Setting::insert($data);
    }
}
