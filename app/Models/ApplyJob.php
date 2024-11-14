<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ApplyJob extends Model
{
    use HasFactory;

    public $table = 'apply_jobs';

    public static function storeData($request)
    {
        $applyJob = new ApplyJob();
        $applyJob->job_title = $request['jobtitle'];
        $applyJob->name = $request['name'];
        $applyJob->email = $request['email'];
        $applyJob->phone = $request['phone'];

        if($request->hasFile('files')){
            $fileName = Str::random(10) . '.' . $request->file('files')->getClientOriginalExtension();
            $pathName ='/carrersFiles/' .  $request['jobtitle'] . '/';

            $request->file('files')->storeAs('/public' . $pathName , $fileName);
            $applyJob->files = $pathName . $fileName;
        }
        $applyJob->information = $request['information'];
        $applyJob->save();
    }
}
