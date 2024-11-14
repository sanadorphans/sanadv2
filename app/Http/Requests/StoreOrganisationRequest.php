<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganisationRequest extends FormRequest
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
            'name'=>'required|max:255',
            'category'=>'required|max:255',
            'field'=>'required|max:255',
            'year'=>'required|numeric|min:1900|max:'.now()->year,
            
            // 'facebook'=>'required',
            'phone'=>'required|digits_between:7,11',
            'email'=>'required|email',
            'geo'=>'required|max:255',
            'address'=>'max:255',
            'governorate'=>'required|max:255',
            'country'=>'required|max:255',
            'communication_way'=>'required|max:255',
            'employees_no'=>'required',
            'point_of_contact_name'=>'required|max:255',
            'point_of_contact_position'=>'required|max:255',
            'point_of_contact_email'=>'email',
            'point_of_contact_phone'=>'required|digits_between:7,11',
            'about_wataneya'=>'required|max:255',
        ];
    }
}
