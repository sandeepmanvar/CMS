<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGeneralSettings;
use App\Http\Requests\StoreSignInIntegrations;
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
        return view('admin.settings.general.index',['settings' => $settings]);
    }

    public function storeGeneralSettings(StoreGeneralSettings $request)
    {
        $type = $request->_type;
        $input = $request->except(['_token','save']);

        if($type == 'general') {
            $hasMaintenanceMode = $request->has('maintenance_mode');
            if(!$hasMaintenanceMode) {
                $input['maintenance_mode'] = 'N';
            }
        }

        if($type == 'localisation') {
            $allowUserLanguage = $request->has('allowuser_language');
            if(!$allowUserLanguage) {
                $input['allowuser_language'] = 'N';
            }
        }

        if($type == 'security') {
            $emailVerification = $request->has('email_verification');
            if(!$emailVerification) {
                $input['email_verification'] = 'N';
            }

            $enableCaptchaForm = $request->has('enable_captcha_form');
            if(!$enableCaptchaForm) {
                $input['enable_captcha_form'] = 'N';
            }

            $disableAdminPwdReset = $request->has('disable_admin_pw_reset');
            if(!$disableAdminPwdReset) {
                $input['disable_admin_pw_reset'] = 'N';
            }
        }

        try {
            foreach ($input as $name => $value) {
                Setting::where('type',$type)
                ->where('name',$name)
                ->update(['value' => $value]);
            }

            if($type == 'general') {
                if($hasMaintenanceMode){
                    Artisan::call('down', ['--message' => $input['maintenance_mode_message']]);
                } else {
                    Artisan::call('up');
                }
            }

            return redirect('admin/settings')->with('status', __('Settings has been saved successfully'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function signin()
    {
        $settings = config('settings.signin');
        return view('admin.settings.signin.index', ['settings' => $settings]);
    }

    public function storeSigninIntegrations(StoreSignInIntegrations $request)
    {
        $input = $request->except(['_token','save']);

        $hasFbSignin = $request->has('facebook_signin');
        if(!$hasFbSignin) {
            $input['facebook_signin'] = 'N';
        }

        $hasGoogleSignin = $request->has('google_signin');
        if(!$hasGoogleSignin) {
            $input['google_signin'] = 'N';
        }
        
        try {
            foreach ($input as $name => $value) {
                Setting::where('type','signin')
                ->where('name',$name)
                ->update(['value' => $value]);
            }

            return redirect('admin/settings/signin')->with('status', __('Settings has been saved successfully'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
