<?php

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\StoreIndividualRequest;
use App\Models\Individual;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;
class IndividualController extends Controller
{
    //
    public function create()
    {
        //
        $user = Auth::user();
        return view('users.individual_form', compact('user'));
    }

    public function store(StoreIndividualRequest $request)
    {
        //
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
         
        $individual = Individual::where('user_id',Auth::user()->id)->first();
        if($individual){
            $individual->delete();
        }

        $org = Individual::create([
            'name'=>$validated->name,
            'user_id'=> Auth::user()->id,
            // 'category'=>$validated->category,
            'job'=>$validated->job,
            'employer'=>$validated->employer,    
            'phone'=>$validated->phone,       
            'country'=>$validated->country,         
            'about_wataneya'=>$validated->about_wataneya,
            
        ]);

       
        
        Auth::user()->update([
            'documented_at' =>now(),
        ]);
        return redirect()->route('dashboard');
    }
    public function edit(){
        $user = Auth::user();
        $individual = $user->individual;
        return view('users.individual_edit', compact('user','individual'));
    }

    public function update(StoreIndividualRequest $request){

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
         
        // $individual = Individual::where('user_id',Auth::user()->id)->first();
        // if($individual){
        //     $individual->delete();
        // }

        $user->individual->update([
            'name'=>$validated->name,
            'user_id'=> Auth::user()->id,
            // 'category'=>$validated->category,
            'job'=>$validated->job,
            'employer'=>$validated->employer,    
            'phone'=>$validated->phone,       
            'country'=>$validated->country,         
            'about_wataneya'=>$validated->about_wataneya,
            
        ]);

       
        
        
        return redirect()->route('dashboard');
    }
    
}
