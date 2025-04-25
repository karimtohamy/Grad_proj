<?php

namespace App\Http\Controllers\Customer;

use App\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\LocationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'service_provider_id' => 'required|exists:service_providers,id',
            'datetime' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $customer = auth()->user()->customer;

        if (!$customer) {
            return response()->json(['error' => 'Customer profile not found.'], 403);
        }

        $address = LocationService::revreseLocation($request->latitude, $request->longitude);
        $fields = ['suburb', 'quarter', 'neighbourhood', 'village', 'hamlet', 'town', 'city_district', 'city'];
        $shortAddress = null;

        foreach ($fields as $field) {
            if (!empty($address['address'][$field])) {
                $shortAddress = $address['address'][$field];
                break;
            }
        }
        logger($shortAddress);
        $formattedDatetime = Carbon::parse($request->datetime)->format('Y-m-d H:i:s');

        $booking = Booking::create([
            'status' => 'pending',
            'customer_id' => $customer->id,
            'service_provider_id' => (int) $request->service_provider_id,
            'booked_time' => $formattedDatetime,
            'short_address' => $shortAddress,
            'message'=>$request->message ?? null
        ]);

        return response()->json([
            'message' => 'Booking created successfully',
            'booking' => $booking
        ]);
    }
}
