<?php

namespace App\Models;

use App\Models\Carrer;
use Illuminate\Database\Eloquent\Model;

class CarrerType extends Model
{
     function carrer(){
         return $this->hasMany(Carrer::class);
     }
}
