<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'user_id'
    ];
    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }
    public function givenReviews()
    {
        return $this->morphMany(Review::class, 'rater');
    }

    public function receivedReviews()
    {
        return $this->morphMany(Review::class, 'rated');
    }

    public function averageRating()
    {
        return $this->receivedReviews()->avg('rating');
    }

    public function supportTickets()
    {
        return $this->morphMany(SupportTicket::class, 'creator');
    }
}
