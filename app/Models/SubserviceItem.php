<?php

namespace App\Models;

use App\Models\SubService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubserviceItem extends Model
{
    use HasFactory;

    public function Subservice(){
        return $this->belongsTo(SubService::class);
    }

}
