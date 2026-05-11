<?php

namespace App\Models;

use App\Models\Service;
use App\Models\SubserviceItem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubService extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->belongsToMany(Service::class, 'multi_sub_services', 'sub_service_id', 'service_id');
    }
    public function items(){
        return $this->hasMany(SubserviceItem::class);
    }
}
