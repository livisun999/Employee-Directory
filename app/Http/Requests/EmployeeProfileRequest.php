<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Employee;

class EmployeeProfileRequest extends Request
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
    public function bindTo(Employee $em){
        $em->name = $this->name;
        $em->job_title = $this->job_title;
        $em->depar_id = $this->depar_id;
        $em->email = $this->email;
        $em->phone = $this->phone;
        $em->mobile = $this->mobile;
        $em->office = $this->office;
        $em->adress = $this->adress;
        $em->sex = $this->sex;
        $em->birthday = $this->birthday;
        $em->type = $this->type;
        $em->status = $this->status;
        $em->wage = $this->wage;
        $em->wage_cur = $this->wage_cur;
        $em->work_from = $this->work_from;
        if($this->hasFile('image')){
            $file = $this->file('image');
            $em->setImage($file);
        }
        return $em;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|digits_between:1,12',
            'birthday'=>'digits_between:1,12',
            'office'=>'digits_between:1,12',
            'birthday'=>'date',
            'work_from'=>'date',
            'wage'=>'numeric',
            'depar_id'=>'unique:Depar,Dep_name'
        ];
    }
    public function messages()
    {
        return [
            'name'=>'name is required',
            'email'=>'email required',
            'mobile'=>'mobile number required',
            'phone'=>'phone must be digits',
            'office'=>'office number must be digits',
            'birthday'=>'birthday must me a date',
            'work_from'=>'work_from must be a date',
            'wage'=>'wage must be numberic',
            'depar_id'=>'department id not found'
        ];
    }
}
