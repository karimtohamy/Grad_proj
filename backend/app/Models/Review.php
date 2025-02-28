<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['rating', 'comments', 'rater_id', 'rater_type', 'rated_id', 'rated_type'];

    // The user who gives the review (Customer/Provider)
    public function rater()
    {
        return $this->morphTo(null, 'rater_type', 'rater_id');
    }

    // The user who receives the review (Customer/Provider)
    public function rated()
    {
        return $this->morphTo(null, 'rated_type', 'rated_id');
    }
}
