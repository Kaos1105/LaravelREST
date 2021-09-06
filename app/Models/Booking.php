<?php

namespace App\Models;

use App\Models\Booking as ModelsBooking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\BookingBuilder;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];
    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)->where('from', '<=', $to);
    }

    public function newEloquentBuilder($query): BookingBuilder
    {
        return new BookingBuilder($query);
    }

    public static function findByReviewKey(string $reviewKey): ?Booking
    {
        return static::whereReviewKey($reviewKey)->with('bookable')->get()->first();
    }

    protected static function booted()
    {
        static::creating(function (ModelsBooking $booking) {
            $booking->review_key = Str::uuid();
        });
    }
}
