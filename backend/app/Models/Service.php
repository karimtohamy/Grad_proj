<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    protected $fillable = [
        'name'
    ];

    public function ServiceProviders(): HasOne
    {
        return $this->hasOne(ServiceProvider::class);
    }
}
