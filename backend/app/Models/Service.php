<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name'
    ];
    public $translatable = ['name'];
    public function ServiceProviders(): HasOne
    {
        return $this->hasOne(ServiceProvider::class);
    }
}
