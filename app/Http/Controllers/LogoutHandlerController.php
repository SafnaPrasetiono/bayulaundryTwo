<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutHandlerController extends Controller
{
    public function LogoutAdmin()
    {
         if (Auth::guard('admins')->check()) {
            Auth::guard('admins')->Logout();
            return redirect()->route('admin.login');
        }
    }

    public function LogoutUser()
    {
         if (Auth::guard('users')->check()) {
            Auth::guard('users')->Logout();
            return redirect()->route('login');
        }
    }
}
