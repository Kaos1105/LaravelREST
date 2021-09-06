<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingByReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @mixed Booking
     * @return array
     */
    public function toArray($request)
    {
        return [
            'booking_id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'bookable' => new BookingByReviewBookableResource($this->bookable)
        ];
    }
}
