<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\CustomException;

class HandledEmployeeProfileRequest extends EmployeeProfileRequest{
	protected function failedValidation(Validator $validator)
    {   
        throw (new CustomException('form validate error(s)', 400))->data($validator->errors());
    }
} 