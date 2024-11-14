<?php

namespace App\Models;

use App\Models\KnowledgeCreation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CmsEvent extends Model
{
    use HasFactory;

    public function KnowledgeCreation(){
        return $this->belongsTo(KnowledgeCreation::class);
    }
}
