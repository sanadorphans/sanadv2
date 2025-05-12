<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspiration extends Model
{
    use HasFactory, Translatable, Searchable;
    protected $translatable = ['title','details'];
}
