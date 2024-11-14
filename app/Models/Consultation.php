<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(ConsultationCategory::class,'category_id');
    }

    public function replies()
    {
        return $this->hasMany(ConsultationReply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
}
