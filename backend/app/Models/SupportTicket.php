<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $fillable = ['created_by', 'created_by_type', 'booking_id', 'assigned_to', 'message', 'status'];

    // Relationship: The user who created the ticket (Admin, Customer, or Service Provider)
    public function creator()
    {
        return $this->morphTo(null, 'created_by_type', 'created_by');
    }

    // Relationship: The admin assigned to this ticket
    public function assignedAdmin()
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    // Relationship: The booking related to this ticket
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
