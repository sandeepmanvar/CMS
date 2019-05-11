<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{
    /**
     * Show the registerd users
     */
    public function index()
    {
        $users = User::all();
        return view('admin.members')->with('users',$users);
        # code...
    }
}
