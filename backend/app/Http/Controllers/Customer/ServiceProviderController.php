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
        $service_providers = $service->ServiceProviders()
            ->with('user')
            ->withCount('receivedReviews')
            ->withAvg('receivedReviews', 'rating')->paginate(10);
        return response()->json([
            'service_providers' => ServiceProviderResource::collection($service_providers),
        ]);

    }
    public function show(ServiceProvider $ServiceProvider)
    {
        $user = $ServiceProvider->user; // this is the User model
        $image = $user->image; // this is the Image model

        $reviews = Review::where('rated_id', $ServiceProvider->id)
            ->where('rated_type', 'provider');

        return response()->json([
            'service_provider_id' => $ServiceProvider->id,
            'user_id' => $user->id,
            'email' => $user->email,
            'phone' => $user->phone,
            'bookings' => $ServiceProvider->bookings ?? null,
            'rating' => $reviews->avg('rating'),
            'comments' => $reviews->whereNotNull('comments')->get('comments')->toArray(),
            'image' => $image?->image_path // or return full URL if needed
        ]);
    }

}
