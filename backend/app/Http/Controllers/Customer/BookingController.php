<?php

namespace App\Http\Controllers\Customer;

use App\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){

    }

    public function show(){

    }

    public function store(Request $request){
        $request->validate([
            'service_provider_id'=>'required|exists:service_providers,id',
            'time' => 'required|date_format:H:i',


        ]);
        $customer_id= auth()->user()->customer->id;
        Booking::create([
            'status'=> BookingStatus::Pending,
            'customer_id'=>$customer_id,
            'service_provider_id'=>$request->service_provider_id,
            'booked_time'=>$request->time
        ]);
    }
}
