<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $service_provider = Auth::user()->provider;
        $request->validate([
            'booking_id' => 'required',
            'status' => 'required',
            'price' => 'required'
        ]);

        $booking = Booking::find($request->booking_id);

        $booking->price = $request->price;
        $booking->status = $request->status;
        $booking->save();
        
    }
}
