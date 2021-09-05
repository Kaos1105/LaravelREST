<?php

namespace App\Models;

use App\QueryBuilders\BookingBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookable extends Model
{
    use HasFactory;

    public static function query()
    {
        return parent::query();
    }

    /**
     * @return \App\QueryBuilders\BookingBuilder|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function availableFor($from, $to): bool
    {
        return $this->bookings()->whereBetweenDates($from, $to)->count() == 0;
    }
}
