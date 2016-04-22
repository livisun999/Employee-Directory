<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 10/04/2016
 * Time: 17:31
 */

namespace App\Http\Controllers;

use App\Extentions\AjaxResponse;
use Illuminate\Routing\Controller;
use App\Models\Depar;
use App\Models\Employee;

class EmployeeController extends controller
{
    public function getListEmployee (){
        $list = Employee::allWithDep(['Dep_name', 'id']);

        return view('Employee.list_employee')->with([
            'list_employee'=>$list,
        ]);
    }
    public function getProfile($id){
        $profile = Employee::find($id);
        $profile->department(['Dep_name', 'id']);
        return ajaxResponse::ok($profile); 
    }
    public function searchEmployeeByName(){
        $name = "minh";
        if(!$name){
            return response()->json([
                'message'=> 'bad request'
                ], 400);
        }

        $results = Employee::findByName($name);
        return ajaxResponse::ok(['info'=>[], 'result'=>$results]);
    }
}