<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProgram extends Model
{
    use HasFactory;

    public function program(){
        return $this->belongsTo(Service::class);
    }
    // public function items(){
    //     return $this->hasMany(SubserviceItem::class);
    // }
}
