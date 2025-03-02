<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __invoke()
    {
        $services = Service::get()->toArray();
        $featured_providers= ServiceProvider::where('is_featured',1)->get()->toArray();
        return response()->json([
            'services' => $services,
            'featured_providers' => $featured_providers
        ]);
    }
}
