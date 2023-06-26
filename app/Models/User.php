<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'birth_date',
        'pronoun',
        'display_name',
        'country',
        'state',
        'city',
        'street_and_number',
        'postal_code',
        'phone_number',
        'school_level',
        'school_grade',
        'tshirt_size',
        'tshirt_style',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            $user->display_name = $user->name.' '.$user->last_name;
        });
    }

    public function hasRole(string $role) : bool
    {
        return $this->role == $role;
    }

    protected function pronoun(): Attribute
    {
        return new Attribute(
            get: fn ($value) => (string) $value,
        );
    }

    public function isContestant() : bool
    {
        return $this->role == 'Competidor';
    }

    public function isAdmin() : bool
    {
        return $this->role == 'Administrador' || $this->role == 'Superadmin';
    }

    public function isSuperadmin() : bool
    {
        return $this->role == 'Superadmin';
    }

    public function getFullName()
    {
        return $this->name.' '.$this->last_name;
    }

    public function getFullAddress()
    {
        return implode(', ', [
            $this->street_and_number,
            $this->city,
            $this->state,
            $this->postal_code,
            $this->country,
        ]);
    }
}
