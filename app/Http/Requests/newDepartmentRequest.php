<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class newDepartmentRequest extends Request
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
            'DepartmentName'=>'required',
            'RoomNumber'=>'required',
            'DepartmentPhone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'DepartmentName'=>'Please Enter The Department Name',
            'RoomNumber'=>'Enter The Room Number',
            'DepartmentPhone'=>'Enter The Department phone',
        ];
    }
}
