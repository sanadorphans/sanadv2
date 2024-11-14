<?php

namespace App\Models;

use App\Models\KnowledgeCreation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConferencesAndForum extends Model
{
    use HasFactory;

    function KnowledgeCreation(){
        $this->belongsTo(KnowledgeCreation::class);
    }
}
