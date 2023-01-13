<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\AuthController;
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


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */

         Route::get('/register', [AuthController::class, 'show'])->name('register.show');
        Route::post('/register', [AuthController::class,'register'])->name('register.perform');

        /**
         * Login Routes
         */

         Route::get('/login', [LoginController::class, 'show'])->name('login.show');
         Route::post('/login', [LoginController::class,'login'])->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */

         Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });


});


// get Controller methods

// Route::get('users/{id?}', [UserController::class, 'getUsers']);
// Route::get('order/{id?}', [OrderController::class, 'getOrder']);

// Route::get('/contact/all', [ContactController::class, "index"]);

// // ============ post methods ==========

// Route::post('storeUser', [UserController::class, 'storeUser']);
// Route::post('storeOrder', [OrderController::class, 'storeOrder']);
// Route::post('/contact', [ContactController::class, "store"]);



// // ============ update methods ==========

// Route::post('updateUser/{id?}', [UserController::class, 'updateUser']);

// Route::post('updateOrder/{id?}', [OrderController::class, 'updateOrder']);

// //delete 
// Route::delete('deleteUser/{id?}', [UserController::class, 'deleteUser']);

// Route::delete('deleteOrder/{id?}', [OrderController::class, 'deleteOrder']);

// Route::delete('/contact/{id}', [ContactController::class, "destroy"]);
