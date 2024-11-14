<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrphanageRequest;
use App\Models\Orphanage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class OrphanageController extends Controller
{
    //
    public function create(){
        $user = Auth::user();
        return view('users.orphanage_form', compact('user'));
    }
    public function store(StoreOrphanageRequest $request){
        $user = Auth::user();
        $validated = $request->validated();
        $validated = $request->safe();
        
        if($request->hasFile('image')){
            $img = Image::make($request->image);
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->crop(100, 100);
            $user = Auth::user();
            // File::makeDirectory(storage_path('app/public/individuals_profile_photos/'));
            $profileImageName = $user->id.'_image'.time().'.'.request()->image->getClientOriginalExtension();
            $img->save(storage_path('app/public/individuals_profile_photos/'). $profileImageName, 100, 'jpg');
            $path_profile_photo ='individuals_profile_photos/'.$profileImageName;
            $user_1 = User::where('id',Auth::user()->id)->update([
                'avatar'=> $path_profile_photo,
            ]);
            // dd($user_1);
        } 
        // dd();
        $orphanage = Orphanage::where('user_id',Auth::user()->id)->first();
        if($orphanage){
            $orphanage->delete();
        }
        $orphanage = Orphanage::create(
            $request->except(['_token','image']),
            
            
        );
        Auth::user()->update([
            'documented_at' =>now(),
        ]);
        // $orphanage->update([
        //     'user_id' => Auth::user()->id,
        // ]);
        return redirect()->route('dashboard');
    }
    public function edit(){
        $user = Auth::user();
        $orphanage = $user->orphanage;
        return view('users.orphanage_edit', compact('user','orphanage'));
    }
    public function update(StoreOrphanageRequest $request){
        $user = Auth::user();
        $validated = $request->validated();
        $validated = $request->safe();
        
        if($request->hasFile('image')){
            $img = Image::make($request->image);
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->crop(100, 100);
            $user = Auth::user();
            // File::makeDirectory(storage_path('app/public/individuals_profile_photos/'));
            $profileImageName = $user->id.'_image'.time().'.'.request()->image->getClientOriginalExtension();
            $img->save(storage_path('app/public/individuals_profile_photos/'). $profileImageName, 100, 'jpg');
            $path_profile_photo ='individuals_profile_photos/'.$profileImageName;
            $user_1 = User::where('id',Auth::user()->id)->update([
                'avatar'=> $path_profile_photo,
            ]);
            // dd($user_1);
        } 
        // dd();
        $orphanage = Orphanage::where('user_id',Auth::user()->id)->first();
        
        $orphanage->update(
            $request->except(['_token','image']),
            
            
        );
        
        // $orphanage->update([
        //     'user_id' => Auth::user()->id,
        // ]);
        return redirect()->route('dashboard');
    }
}
