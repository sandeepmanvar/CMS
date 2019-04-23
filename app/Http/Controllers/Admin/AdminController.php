<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAdminProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the admin profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }

    /**
     * Save admin profile details
     */
    public function updateProfile(UpdateAdminProfile $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.profile')->with('status','Your account details has been updated successfully');
    }

    /**
     * Show admin change password form
     */
    public function changePassword() 
    {
        return view('admin.change_password');
        return "change password page";
    }

    /**
     * Update admin password
     */
    public function updatePassword(UpdateAdminProfile $request)
    {
        $user = Auth::user();
        $current_password = $user->password;
        
        if(Hash::check($request->cpassword, $current_password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.change_password')->with('status','Your password has been changed successfully');
        } else {
            return redirect()->route('admin.change_password')->with('error','Current password does not match');
        }
    }
}
