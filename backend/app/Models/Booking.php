<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'service_provider_id',
        'customer_id',
        'status',
        'canceled_by'
    ];
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }

    // Relationship: A booking belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
