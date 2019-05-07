<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        return view('member.account', compact('user'));
    }

    public function save(Request $request)
    {
        $userId = Auth::id();
        $this->validation($request);
        $user = User::find($userId);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();
        return redirect('profile')->with('status', 'Your account details has been updated successfully');
    }

    public function validation($request)
    {
        $rules = [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($request->user()->id),
            ]
        ];

        if (config('settings.security.enable_captcha_form') == 'Y') {
            if (config('settings.security.captcha_type') == 'invisible_recaptcha') {
                $rules += ['g-recaptcha-response' => 'required|recaptcha'];
            } else {
                $rules += ['captcha' => 'required|captcha'];
            }
        }

        return $validatedData = $request->validate($rules);
    }

    public function changePassword()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        return view('member.change_password');
    }

    public function updatePassword(Request $request)
    {
        $userId = Auth::id();
        $this->validatePassword($request);
        $user = User::find($userId);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('account.changepassword')->with('status', 'Your password has been changed successfully');
    }

    public function validatePassword($request)
    {
        $rules = [
            'password' => 'required|confirmed|min:6'
        ];

        if (config('settings.security.enable_captcha_form') == 'Y') {
            if (config('settings.security.captcha_type') == 'invisible_recaptcha') {
                $rules += ['g-recaptcha-response' => 'required|recaptcha'];
            } else {
                $rules += ['captcha' => 'required|captcha'];
            }
        }

        return $validatedData = $request->validate($rules);
    }
}
