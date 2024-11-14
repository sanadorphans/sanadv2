<?php

namespace App\Models;

use App\Models\CarrerType;
use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{
    function carrer_types(){
        return $this->belongsTo(CarrerType::class);
    }
}
