<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'serviceName', 'serviceDescription', 'nameOfProfession',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'user_id'
    ];

    public function typesOfService() {
        return $this->hasMany(TypeService::class);
    }


    public function scheduledTime(){
        return $this->belongsToMany(ScheduledTime::class);
    }
}
