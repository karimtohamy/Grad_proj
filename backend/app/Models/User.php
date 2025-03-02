<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens,HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'phone_verified_at'
    ];
    public $translatable = ['name'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Image(): HasOne
    {
        return $this->hasOne(Image::class);
    }
    // Relationship: If the user is a customer, fetch customer details
    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id');
    }

    // Relationship: If the user is a service provider, fetch provider details
    public function provider()
    {
        return $this->hasOne(ServiceProvider::class, 'user_id');
    }

    // Relationship: If the user is an admin, fetch admin details
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

}
