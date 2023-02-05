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
Route::patch('updateParkings/{id}', [Controller::class, 'editPark']);



// User Routes for User Section
Route::get('/getUsers', [Controller::class, 'getUsers']);
Route::get('/getUsers/{id}', [Controller::class, 'getUsersById']);
Route::delete('deleteUser/{id}',[Controller::class, 'deleteUsersById']);
Route::patch('editUsers/{id}',[Controller::class,'editusers']);


// bookings routes for records sections
Route::get('/getBookings', [Controller::class, 'getBookings']);
Route::get('/getBookings/{id}', [Controller::class, 'getBookingsById']);
Route::delete('deleteBooking/{id}', [Controller::class, 'deleteBookingById']);
Route::patch('/editBooking/{id}', [Controller::class, 'editBooking']);


// contact us routes for inquires section
Route::get('/getContact', [Controller::class, 'getContact']);
Route::delete('/deleteContact/{id}', [Controller::class,'deleteContact']);


// reviews routes for reviews section
Route::get('/getReview', [Controller::class, 'getReview']);


// Newspaper routes for Newsletter section
Route::get('/getNewsletter', [Controller::class, 'getNewsletter']);