<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public function carBrand()
    {
        return $this->belongsTo('App\Models\CarBrand');
    }

    public function car()
    {
        return $this->hasMany('App\Models\Car');
    }

}
