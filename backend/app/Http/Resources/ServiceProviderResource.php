<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $service_provider =$this->resource;
        return[
            'id'=>$service_provider->id,
            'name'=>$service_provider->user->getTranslation('name',app()->getLocale()),
            'has_assistant'=>$service_provider->has_assistant,
            'years_of_expirience'=>$service_provider->years_of_experience,
            'image'=>$service_provider->user->Image,
            'rating'=>Review::where('rated_id', $service_provider->id)
            ->where('rated_type', 'provider')
            ->avg('rating'),


        ];
    }
}
