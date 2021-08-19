<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel');
    }

    public function bodyType()
    {
        return $this->belongsTo('App\Models\BodyType');
    }

    public function carPhoto()
    {
        return $this->hasMany('App\Models\CarPhoto');
    }

}
