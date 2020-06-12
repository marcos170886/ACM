<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleByProfessional extends Model
{
    protected $fillable = [
        'date', 'time'
    ];

    protected $casts = [
        'date' => 'datetime:d/m/Y'
    ];

    protected $hidden = [
        'created_at', 'updated_at',  'user_id'
    ];



    public function professional(){
        return $this->belongsTo(Professional::class);
    }

}
