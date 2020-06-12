<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $fillable = [
        'name', 'email','phone','password'
    ];


    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',  'user_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function schedule(){
        return $this->hasMany(ScheduleByClient::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }
}
