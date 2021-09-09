<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingByReviewResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(String $reviewKey, Request $request)
    {
        //
        $booking = Booking::findByReviewKey($reviewKey);
        return $booking ? new BookingByReviewResource($booking) : abort(404);
    }
}
