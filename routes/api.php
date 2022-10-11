<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BikeDetailsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserDetailController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    // return $request->user();
    //you can add your secure urls here.

});
Route::post('register', [UserController::class, 'register']);

Route::get('getUsers', [UserController::class, 'getUsers']);

Route::post('saveuserdetails', [UserDetailController::class, 'saveUserDetails']);
Route::get('getuserdetailsbyid/{id}', [UserDetailController::class, 'getUserDetailsById']);

Route::post('login', [UserController::class, 'login']);
//for category
Route::get('category', [CategoryController::class, 'getCategory']);
Route::post('createcategory', [CategoryController::class, 'CreateCategory']);
// for bike details'

Route::get('bikedetails', [BikeDetailsController::class, 'getBikeDetails']);
Route::post('insertbike', [BikeDetailsController::class, 'insertBike']);
Route::delete('deletebike/{id}',[BikeDetailsController::class,'deleteBikeDetails']);
//for booking  
Route::get('bikebooking', [BookingController::class, 'getBooking']);
Route::post('insertbikebooking', [BookingController::class, 'bookBike']);
Route::get('bikebooking/{id}', [BookingController::class, 'getBookingById']);
Route::put('bikebooking', [BookingController::class, 'updateBikeStatus']);
Route::delete('deletebooking/{id}',[BookingController::class,'deleteBooking']);
