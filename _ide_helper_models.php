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
 * App\Models\Address
 *
 * @mixin IdeHelperAddress
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $state
 * @property string $zip
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZip($value)
 */
	class IdeHelperAddress extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bookable
 *
 * @mixin IdeHelperBookable
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $description
 * @property int $price
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
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereUpdatedAt($value)
 */
	class IdeHelperBookable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @mixin IdeHelperBooking
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $from
 * @property string $to
 * @property int $bookable_id
 * @property string $review_key
 * @property int|null $price
 * @property int|null $address_id
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\Bookable $bookable
 * @property-read \App\Models\Review|null $review
 * @method static BookingBuilder|Booking betweenDates($from, $to)
 * @method static \Database\Factories\BookingFactory factory(...$parameters)
 * @method static BookingBuilder|Booking newModelQuery()
 * @method static BookingBuilder|Booking newQuery()
 * @method static BookingBuilder|Booking query()
 * @method static BookingBuilder|Booking whereAddressId($value)
 * @method static BookingBuilder|Booking whereBetweenDates($from, $to)
 * @method static BookingBuilder|Booking whereBookableId($value)
 * @method static BookingBuilder|Booking whereCreatedAt($value)
 * @method static BookingBuilder|Booking whereFrom($value)
 * @method static BookingBuilder|Booking whereId($value)
 * @method static BookingBuilder|Booking wherePrice($value)
 * @method static BookingBuilder|Booking whereReviewKey($value)
 * @method static BookingBuilder|Booking whereTo($value)
 * @method static BookingBuilder|Booking whereUpdatedAt($value)
 */
	class IdeHelperBooking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @mixin IdeHelperReview
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
	class IdeHelperReview extends \Eloquent {}
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
 * @mixin IdeHelperUser
 */
	class IdeHelperUser extends \Eloquent {}
}

