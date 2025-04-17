<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceProviderResource;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __invoke()
    {
        $services = Service::get(['name', 'id'])->map(function ($service) {
            return [
                'id' => $service->id,
                'name' => $service->getTranslation('name', app()->getLocale()),

            ];
        })->toArray();
        $featured_providers = ServiceProvider::with(['user.image', 'service'])
            ->withCount('receivedReviews')
            ->withAvg('receivedReviews', 'rating')
            ->where('is_featured', 1)
            ->orderBy('received_reviews_avg_rating', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'services' => $services,
            'featured_providers' => ServiceProviderResource::collection($featured_providers)
        ]);
    }
}
