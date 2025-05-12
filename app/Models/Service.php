<?php

namespace App\Models;

use App\Models\SubService;
use App\Traits\SearchablePageTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, Translatable, SearchablePageTrait;
    protected $translatable = ['title','details'];

    public function sub_services(){
        return $this->hasMany(SubService::class);
    }
}
