<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceProviderResource;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function index(Service $service)
    {
        $service_providers = $service->ServiceProviders()->get();
        return response()->json([
            ServiceProviderResource::collection($service_providers)
        ]);

    }
    public function show(ServiceProvider $ServiceProvider)
    {
        $provider = $ServiceProvider->user;
        $reviews = Review::where('rated_id', $ServiceProvider->id)->where('rated_type', 'provider');
        return response()->json([
            'service_provider_id' => $ServiceProvider->id,
            'user_id' => $provider->id,
            'email' => $provider->email,
            'phone' => $provider->phone,
            'bookings' => $ServiceProvider->bookings() ?? null,
            'rating' => $reviews->avg('rating'),
            'comments' => $reviews->whereNotNull('comments')->get('comments')->toArray()
        ]);
    }
}
