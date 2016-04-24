<?php
namespace App\Http\Requests;

class HandledEmployeeProfileRequest extends EmployeeProfileRequest{
	protected function failedValidation(Validator $validator)
    {   
        throw (new CustomException('form validate error(s)', 400))->data($validator->errors());
    }
} 