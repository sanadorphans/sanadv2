<?php

namespace App\Models;

use App\Models\CmsEvent;
use App\Models\Resource;
use App\Models\ConferencesAndForum;
use Illuminate\Database\Eloquent\Model;

class KnowledgeCreation extends Model
{
    public function Resources(){
        return $this->hasMany(Resource::class);
    }
    public function ConferencesAndForum(){
        return $this->hasMany(ConferencesAndForum::class);
    }

    public function Events(){
        return $this->hasMany(CmsEvent::class);
    }
}
