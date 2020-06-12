<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'managerMail','managerPassword'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'id', 'user_id'
    ];
}
