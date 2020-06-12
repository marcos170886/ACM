<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleByClient extends Model
{
    protected $fillable = [
        'date', 'time', 'professionalName', 'serviceName'
    ];

    protected $casts = [

        'date' => 'datetime:d/m/Y'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'user_id'
    ];

    public function client(){
        return $this->belongsTo(User::class);
    }
}
