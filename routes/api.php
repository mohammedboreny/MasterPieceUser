<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Statistics routes for Admin Home
Route::get('/getSummary', [Controller::class, 'getSum']); //
Route::get('/getTotal', [Controller::class, 'getTotal']); //
Route::get('/getBookingsDesc', [Controller::class, 'getBookingsDesc']); //


// Parking Routes for Parking Section
Route::get('/getParkings', [Controller::class, 'getParkings']);
Route::get('/getParkings/{id}', [Controller::class, 'getParkingsById']);
Route::delete('deleteParkings/{id}', [Controller::class, 'deleteParking']);
Route::put('updateParkings/{id}', [Controller::class, 'editPark']);



// User Routes for User Section
Route::get('/getUsers', [Controller::class, 'editUser']);
Route::get('/getUsers/{id}', [Controller::class, 'getUsersById']);
Route::delete('deleteUser/{id}', [Controller::class, 'deleteUsersById']);
Route::put('editUsers/{id}', [Controller::class, 'editUser']);
