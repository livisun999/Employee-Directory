<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class changePasswordRequest extends Request
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

               'Current_password'=>'required',
               'New_password'=>'required',
               'New_password_confirmation'=>'required|same:New_password',
           ];
    }
    public function messages()
    {
        return [
            'Current_password.required'=>'Please Enter The Current Password',
            'New_password'=>'Please Enter The New Password',
            'New_password_confirmation.require'=>'Please Enter The Re-Password',
            'New_password_confimation.same'=>'Check New Password and Re-New Password',
        ];
    }
}
