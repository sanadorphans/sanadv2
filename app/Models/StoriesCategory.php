<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoriesCategory extends Model
{
    use HasFactory;
    // make relationship between story and StoriesCategory

    public function Story()
    {
        return $this->hasMany(Story::class);
    }
}
