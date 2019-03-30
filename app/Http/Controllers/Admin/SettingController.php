<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGeneralSettings;
use App\Setting;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $settings = config('settings');
        return view('admin.setting',['settings' => $settings]);
    }

    public function storeGeneralSettings(StoreGeneralSettings $request)
    {
        $hasMaintenanceMode = $request->has('maintenance_mode');
        $input = $request->except(['_token','save']);
        
        if(!$hasMaintenanceMode)
            $input['maintenance_mode'] = 'N';

        foreach ($input as $name => $value) {
            Setting::where('type','general')
            ->where('name',$name)
            ->update(['value' => $value]);
        }

        if($hasMaintenanceMode){
            Artisan::call('down', ['--message' => $input['maintenance_mode_message']]);
        } else {
            Artisan::call('up');
        }

        // if($hasMaintenanceMode)
     
        return redirect('admin/settings')->with('status', __('Settings has been saved successfully'));
    }
}
