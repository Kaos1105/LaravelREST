<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Bookable
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\BookableFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereUpdatedAt($value)
 */
	class Bookable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $from
 * @property string $to
 * @property int $bookable_id
 * @property string $review_key
 * @property-read \App\Models\Bookable $bookable
 * @property-read \App\Models\Review|null $review
 * @method static \App\QueryBuilders\BookingBuilder|Booking betweenDates($from, $to)
 * @method static \Database\Factories\BookingFactory factory(...$parameters)
 * @method static \App\QueryBuilders\BookingBuilder|Booking newModelQuery()
 * @method static \App\QueryBuilders\BookingBuilder|Booking newQuery()
 * @method static \App\QueryBuilders\BookingBuilder|Booking query()
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereBetweenDates($from, $to)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereBookableId($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereCreatedAt($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereFrom($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereId($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereReviewKey($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereTo($value)
 * @method static \App\QueryBuilders\BookingBuilder|Booking whereUpdatedAt($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $rating
 * @property string $content
 * @property int $bookable_id
 * @property int|null $booking_id
 * @property-read \App\Models\Bookable $bookable
 * @property-read \App\Models\Booking|null $booking
 * @method static \Database\Factories\ReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereBookableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

