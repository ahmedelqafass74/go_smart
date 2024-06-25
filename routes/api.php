<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityReview;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HotelReviewController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LandmarkReviewController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\ResturantReviewController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ReviewCity;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewHotel;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReviewLandmark;
use App\Http\Controllers\ReviewResturant;
use App\Http\Controllers\PaymobController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/auth', function (Request $request) {
    return response()->Json(['message' => 'please login first']);
})->name('auth');

Route::post('register', [AuthController::class, 'register']);
Route::put('updateProfile', [AuthController::class, 'updateProfile']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/Cities/Explore', [PlacesController::class, 'CitiesAction']);
Route::get('/Cities/Explore/{Cityid}', [PlacesController::class, 'ShowOneCity']);

Route::get('/Landmarks/Explore', [PlacesController::class, 'LandmarksAction']);
Route::get('/Landmarks/Explore/{Landmarkid}', [PlacesController::class, 'ShowOneLandmark']);

Route::get('/Resturants/Explore', [PlacesController::class, 'ResturantsAction']);
Route::get('/Resturants/Explore/{Resturantid}', [PlacesController::class, 'ShowOneResturant']);

Route::get('/Hotels/Explore', [PlacesController::class, 'HotelsAction']);
Route::get('/Hotels/Explore/{Hotelid}', [PlacesController::class, 'ShowOneHotel']);

Route::controller(ActivityController::class)->group(function() {
    Route::get('/Historical/Explore', 'HistoricalAction');
    Route::get('/Diving/Explore', 'DivingAction');
    Route::get('/Relaxation/Explore', 'relaxationAction');
    Route::get('/Safari/Explore',  'SafariAction');
    });

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/Cities/AddCityReview/{cityid}', [ReviewCity::class, 'AddReviewToCity']);
    Route::post('/Hotels/AddHotelReview/{hotelid}', [HotelReviewController::class, 'AddReviewToHotel']);
    Route::post('/Landmarks/AddLandmarkReview/{Landmarkid}', [LandmarkReviewController::class, 'AddReviewToLandmark']);
    Route::post('/Resturants/AddResturantReview/{Resturantid}', [ResturantReviewController::class, 'AddReviewToResturant']);
});

Route::get('/Cities/CityReview/{cityid}', [ReviewCity::class, 'GetReviewsForCity']);
Route::get('/Hotels/HotelReview/{hotelid}', [HotelReviewController::class, 'GetReviewsForHotel']);
Route::get('/Landmarks/LandmarkReview/{Landmarkid}', [LandmarkReviewController::class, 'GetReviewsForLandmark']);
Route::get('/Resturants/ResturantReview/{Resturantid}', [ResturantReviewController::class, 'GetReviewsForResturant']);


Route::controller(ImportController::class)->group(function() {
Route::post('/Import/City', 'ImportCity');
Route::post('/Import/Hotel', 'ImportHotel');
Route::post('/Import/Landmark', 'ImportLandmark');
Route::post('/Import/Resturant',  'ImportResturant');
Route::post('/Import/Historical',  'ImportHistorical');
Route::post('/Import/Diving',  'ImportDiving');
Route::post('/Import/Relaxation',  'ImportRelaxation');
Route::post('/Import/Safari',  'ImportSafari');

});

Route::apiResource('/drivers',DriverController::class);
Route::get('city-data', [CityController::class, 'getCityData']);


Route::post('checkout/processed',[PaymobController::class ,'checkout_processed']);


Route::post('checkout/{id}',[CheckoutController::class ,'index'])->name('checkout.index');

Route::get('checkout/response', function ( Request $request) {
    return $request->all();
});