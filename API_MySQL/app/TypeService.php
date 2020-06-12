<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    protected $fillable = [
        'name', 'price'
    ];


    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function service(){
        return $this->belongsTo(Service::class);
    }
}
