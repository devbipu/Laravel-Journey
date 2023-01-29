<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormValidator extends FormRequest
{
    protected $stopOnFirstFailure = false; //stop request on 1st error
    //protected $redirect = '/contact'; //Redirect to path route if request validator fail
    //protected $redirectRoute  = 'front.contact'; //Redirect to Name route if validator fail 
    

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'email'  => 'required|email',
            'password'  => 'required|min:4',
            'confirm_password'  => 'required|same:password',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     * Customize the message here
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'email.required' => 'Email is required customize',
        ];
    }
}
