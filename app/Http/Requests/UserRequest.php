<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'gender'=>'required',
            'nickname'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=>'image|mimes:jpg,jpeg,png'
        ];
    }
    public function messages(){
        return[
            'name.required'=> "Name can not empty",
            'nick.required'=> "please fill it",
            'gender.required'=> "please choose",
            'email.required'=>"fill it!",
            'password.required'=>'fill password'
        ];


    }
}
