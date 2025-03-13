<?php

namespace App\Models;

// Laravel built-in authentication and notifications
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;

// Import necessary relationships
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Wishlist;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'post_code',
        'city',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = Crypt::encryptString($value);
    }

    public function getAddressAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;;
    }

    public function setPostCodeAttribute($value)
    {
        $this->attributes['post_code'] = Crypt::encryptString($value);
    }

    public function getPostCodeAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;;
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = Crypt::encryptString($value);
    }

    public function getCityAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;;
    }

}


