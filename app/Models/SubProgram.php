<?php

namespace App\Models;

use App\Traits\SearchablePageTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProgram extends Model
{
    use HasFactory, Translatable, SearchablePageTrait;
    protected $translatable = ['title','details'];

    public function program(){
        return $this->belongsTo(Service::class);
    }
    // public function items(){
    //     return $this->hasMany(SubserviceItem::class);
    // }
}
