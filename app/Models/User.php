<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the admin associated with the user.
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Get the intervenant associated with the user.
     */
    public function intervenant()
    {
        return $this->hasOne(Intervenant::class);
    }

    /**
     * Get the medical assistant associated with the user.
     */
    public function medical_assistant()
    {
        return $this->hasOne(MedicalAssistant::class);
    }

    /**
     * Get the social assistant associated with the user.
     */
    public function social_assistant()
    {
        return $this->hasOne(SocialAssistant::class);
    }

    /**
     * The donnees that belong to the user.
     */
    public function donnees()
    {
        return $this->belongsToMany(Donnee::class)
                    ->as('donnee_user')
                    ->withTimestamps();
    }
}
