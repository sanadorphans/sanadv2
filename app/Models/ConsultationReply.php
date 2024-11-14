<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationReply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
