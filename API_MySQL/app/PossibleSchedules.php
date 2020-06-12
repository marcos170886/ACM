<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PossibleSchedules extends Model
{
    protected $fillable = [
        'time'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'id', 'user_id'
    ];

}
