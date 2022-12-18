<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


// Home Controller
Route::get('/', function () {
    return view('home');
})->name('home');


// About Page Controller
Route::get('about', function () {
    return view('about');
})->name('about');



// Contact us Page Controller

Route::get('contact', function () {
    return view('contact');
})->name('contact');


// Services Page Controller

Route::get('service', function () {
    return view('service');
})->name('service');

// Sign in Page Controller

Route::get('/signin', function () {
    return   view('authentications/signin');
})->name('signIn');


// Signup Page Controller

Route::get('/signup', function () {
    return   view('authentications/signUp');
})->name('signUp');
