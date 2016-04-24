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
use App\Http\Requests\EmployeeProfileRequest;

class EmployeeController extends controller
{
    public function getListEmployee (){
        $list = Employee::allWithDep(['Dep_name', 'id']);
        $depList = Depar::all(['Dep_name', 'id']);
        return view('Employee.list_employee')->with([
            'list_employee'=>$list,
            'list_department'=>$depList
        ]);
    }
    public function getProfile($id){
        $profile = Employee::findOrFail($id);
        $profile->department(['Dep_name', 'id']);
        return ajaxResponse::ok($profile); 
    }
    public function updateProfile(EmployeeProfileRequest $request, $eid){
        $employee = Employee::findOrFail($eid);
        $request->bindTo($employee);
        $employee->save();
        $employee->department(["Dep_name", "id"]);
        return AjaxResponse::ok($employee);

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