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
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'has_assistant' => $this->has_assistant,
            'years_of_experience' => $this->years_of_experience,
            'service_id' => $this->service_id,
            'slug' => $this->slug,
            'is_featured' => $this->is_featured,
            'received_reviews_count' => $this->received_reviews_count,
            'received_reviews_avg_rating' => $this->received_reviews_avg_rating,
            'name' => $this->user->getTranslation('name', app()->getLocale()),
            'service_name' => $this->service->getTranslation('name', app()->getLocale()),
        ];

    }
}
