<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceProviderResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get(['name', 'id'])->map(function ($service) {
            return [
                'id' => $service->id,
                'name' => $service->getTranslation('name', app()->getLocale()),

            ];
        })->toArray();

        return response(['services' => $services]);
    }

  
}
