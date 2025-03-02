<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceProvider extends Model
{
    protected $fillable = [
        'user_id',
        'has_assistant',
        'years_of_experience',
        'service_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function LegalImages(): HasMany
    {
        return $this->hasMany(LegalImage::class);
    }

    public function Service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function givenReviews()
    {
        return $this->morphMany(Review::class, 'rater');
    }

    public function receivedReviews()
    {
        return $this->morphMany(Review::class, 'rated');
    }

    public function getAverageRating()
    {
        return $this->receivedReviews()->avg('rating');
    }
    public function supportTickets()
    {
        return $this->morphMany(SupportTicket::class, 'creator');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_provider_id');
    }

}
