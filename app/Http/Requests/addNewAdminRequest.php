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
            'Email'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Please Enter The Username',

            'Email.require'=>'Please Enter the Email',
        ];
    }
}
