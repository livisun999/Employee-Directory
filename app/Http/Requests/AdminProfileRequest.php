<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;

class AdminProfileRequest extends Request
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

    public function bindTo(User $u){
        $u->yourname = $this->username;
        $u->email = $this->email;
        if($this->hasFile('image')){
            $file = $this->file('image');
            $u->setImage($file);
        }
        return $u;
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
            'email' => 'required|email',
            'id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Please Enter The Username',
            'password.required'=>'Please Enter The Password',
            'email' => 'Please Enter The Email',
            'id.required' => "Please don't try to hack me" 
        ];
    }
}
