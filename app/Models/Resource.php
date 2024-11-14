<?php

namespace App\Models;

use App\Models\KnowledgeCreation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    public function KnowledgeCreation(){
        return $this->belongsTo(KnowledgeCreation::class);
    }

}
