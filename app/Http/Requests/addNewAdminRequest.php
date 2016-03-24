<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addNewAdminRequest extends Request
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
            'username'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
            'Email'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Please Enter The Username',
            'password.required'=>'Please Enter The Password',
            'password_confirmation.require'=>'Please Enter The Re-Password',
            'password_confimation.same'=>'Check Password and Re-Password',
            'Email.require'=>'Please Enter the Email',
        ];
    }
}
