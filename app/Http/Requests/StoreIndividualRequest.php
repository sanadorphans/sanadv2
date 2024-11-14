<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndividualRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
                //
                'name'=>'required|string|max:255',
                'job'=>'required|string|max:255',
                'employer'=>'required|string|max:255',
            
                'phone'=>'required|digits_between:7,11',
               
                'country'=>'required|string|max:255',
                
                'about_wataneya'=>'required|string|max:255',
        ];
    }
}
