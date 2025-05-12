<?php

namespace App\Models;

use App\Models\Service;
use App\Models\SubserviceItem;
use App\Traits\SearchablePageTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubService extends Model
{
    use HasFactory, Translatable, SearchablePageTrait;
    protected $translatable = ['title','details'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function items(){
        return $this->hasMany(SubserviceItem::class);
    }
}
