<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 10/04/2016
 * Time: 17:31
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Depar;
use App\Models\Employee;
use App\Http\Requests\EmployeeProfileRequest;
use App\Http\Requests\HandledEmployeeProfileRequest;
use App\Extentions\AjaxResponse;
use Session;



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
    public function updateProfile(HandledEmployeeProfileRequest $request, $eid){
        $employee = Employee::findOrFail($eid);
        $request->bindTo($employee);
        $employee->saveWithImage();
        $employee->department(["Dep_name", "id"]);
        return AjaxResponse::ok($employee);
    }
    public function searchEmployeeByName(){
        $name = Input::get('name');
        $results = Employee::findByName($name);
        $depList = Depar::all(['Dep_name', 'id']);
        return view('Employee.search_result')->with([
            'list_employee'=>$results, 
            'list_department'=>$depList
        ]);
    }
    public function getNewEmployee (){
        $listDepartment = Depar::all(["Dep_name", "id"]);
        return view('Employee.new_employee')->with('listDepartment', $listDepartment);
    }
    public function postNewEmployee(EmployeeProfileRequest $request){
        $employee = new Employee();
        $request->bindTo($employee);
        $employee->saveWithImage();
        Session::flash('flash_message', 'create employee successfully'); 
        Session::flash('flash_level', 'success');
        if($request->addNext){
            return Redirect()->back();
        }
        return Redirect()->route('listemployee');
    }
}