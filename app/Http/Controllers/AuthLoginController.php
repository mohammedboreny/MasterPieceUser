<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthLoginController extends Controller
{
    public function googleRedirect()
    {

        return Socialite::driver('google')->stateless()->redirect();
    }
    public function googleCallBack()
    {
        $userdata = Socialite::driver('google')->stateless()->user();
        $user=User::where('email',$userdata->email)->where('auth_type','google')->first();

        if($user)
        {
            Auth::login($user);
            return redirect('/');
        }
        else
        {
             //do register
            $uuid = Str::uuid()->toString();
            $user =new User();
            $user->fullName =$userdata->name;
            $user->email  =$userdata->email;
            $user->password =Hash::make($uuid.now());
            $user->auth_type ='github';
            $user->save();  
            Auth::login($user);
            return redirect('/');
        }
       
    }
}
