<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookableAvailability;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookablePriceController;
use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookingByReviewController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ReviewController;
use App\Models\Bookable;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('bookables', BookableController::class)->only(['index', 'show']);
    Route::get('bookables/{bookable}/availability', BookableAvailability::class)->name('bookables.availability.show');
    Route::get('bookables/{bookable}/reviews', BookableReviewController::class)->name('bookables.reviews.show');
    Route::get('bookables/{bookables}/price', BookablePriceController::class)->name('bookables.price.show');

    Route::get('booking-by-review/{reviewKey}', BookingByReviewController::class)->name('booking.by-review.show');

    Route::apiResource('reviews', ReviewController::class)->only(['show', 'store']);

    Route::post('checkout', CheckoutController::class)->name('checkout');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
