<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
public function show(){
    return view("authentications.signin");
}



public function login(LoginRequest $request){
    $credentials=$request->getCredentials();
    if(!auth::validate($credentials)):
        return redirect()->to('signin')
        ->withErrors(trans('auth.failed'));
    endif;
    $user=Auth::getProvider()->retrieveByCredentials($credentials);
    Auth::login($user);
    return $this->authenticated($request,$user);
}

protected function authenticated(Request $request, $user) 
{
    return redirect()->intended();
}
}
