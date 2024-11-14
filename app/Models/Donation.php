<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get rules
     *
     * @return mixed
     */
    public static function rules() {
        return [
            'name' => 'nullable|string|min:2|max:100',
            'phone_number' => 'nullable|phone:phone_country,mobile',
            'phone_country' => 'nullable|alpha|size:2',
            'email' => 'nullable|email|min:2|max:100',
            'bank_name' => 'required|string|min:2|max:100',
            'amount' => 'required|numeric|min:0|max:999999',
        ];
    }
}
