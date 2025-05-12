<?php

namespace App\Models;

use App\Traits\SearchablePageTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, Translatable, SearchablePageTrait;
    protected $translatable = ['title','details'];

    public function sub_programs(){
        return $this->hasMany(SubProgram::class);
    }
}
