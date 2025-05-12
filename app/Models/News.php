<?php

namespace App\Models;

use App\Traits\SearchablePageTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, Translatable, SearchablePageTrait;
    protected $translatable = ['title','details'];
    protected $table = 'news';
}
