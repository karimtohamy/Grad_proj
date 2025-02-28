<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegalImage extends Model
{
    protected $fillable = [
        'user_id',
        'image_path'
    ];
    public function ServiceProvider():BelongsTo{
        return $this->belongsTo(ServiceProvider::class);
    }
}
