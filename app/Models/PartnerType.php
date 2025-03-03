<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    use HasFactory;
    public function Partner(){
        return $this->hasMany(Partner::class);
    }
}
