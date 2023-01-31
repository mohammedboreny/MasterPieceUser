<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LogoutController as ControllersLogoutController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RegisterController;
use Illuminate\Contracts\View\View;

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



Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/aboutUs', function () {
        return View('about');
    })->name('aboutUs');
    Route::get('/services', function () {
        return View('service');
    })->name('services');


    // Profile Routes
    Route::get('/profile/{id}', function () {
        return View('/profile');
    })->name('profile');
    Route::get('/profile/{id}/summery', function () {
        return View('profileComponents.Overview');
    })->name('profile.summary');
    Route::get('/profile/{id}/Bookings', function () {
        return View('profileComponents.Bookings');
    })->name('profile.Bookings');
    Route::get('/profile/{id}/addReview', function () {
        return View('profileComponents.addReview');
    })->name('profile.addReview');


    // contactUs routes
    Route::get('/contactUs', 'ContactController@viewPage')->name('contactUs.view');
    Route::post('/contactUs', 'ContactController@store')->name('contactUs.store');

    // NewsLetter routes
    Route::post('/newsLetter', 'Newsletter@store')->name('newsLetter.store');
   

    // Order And Booking  routes 
    Route::post('/order', 'BookingController@setOrder')->name('order.SetOrder');
    Route::get('/locations', 'LocationController@index')->name('location.index');
    Route::post('/locations/{id}', 'LocationController@getLocation')->name('location.get');
    Route::get('/order', 'MapController@index')->name('order.create');
    Route::get('/order/{id}', 'BookingController@checkOut')->name('order.checkOut');
    Route::post('/order/Confirmation', [BookingController::class,'OrderConfirmation'])->name('order.Confirmation');

    // Google Auth Controllers
    Route::get('/auth/google/redirect', [AuthLoginController::class, 'googleRedirect'])->name("googleRedirect");
    Route::get('/auth/google/callback', [AuthLoginController::class, 'googleCallBack']);


    



    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */

        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

        /**
         * Login Routes
         */

        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */

        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });
});
