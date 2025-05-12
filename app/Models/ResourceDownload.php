<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceDownload extends Model
{
    use HasFactory;
    public static function storeData($request,$id)
    {
        $ResourceDownload = new ResourceDownload();
        $ResourceDownload->resource_id = $id;
        $ResourceDownload->name = $request['name'];
        $ResourceDownload->email = $request['email'];
        $ResourceDownload->phone = $request['phone'];
        $ResourceDownload->society = $request['society'];
        $ResourceDownload->category = $request['category'];

        $ResourceDownload->save();
    }
}
