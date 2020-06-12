<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $fillable = [
        'professionalName', 'professionalPhone', 'professionalService'
    ];

    protected $hidden = [
      'created_at', 'updated_at','professionalService','id', 'user_id'
    ];


    public function schedule(){
        return $this->hasMany(ScheduleByProfessional::class);
    }


}
