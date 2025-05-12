<?php

namespace App\Models;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class AnnualReport extends Model
{
    use HasFactory, Translatable, Searchable;
    protected $translatable = ['title'];
    public $table = 'annual_report';
}
