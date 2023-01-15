<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LogoutController extends Controller
{


    public function perform()
    {
        Auth::logout();
        return redirect('/')->with("Logout","Logout successfully");
    }
}