<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 10/04/2016
 * Time: 17:31
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Depar;
use App\Models\Employee;

class EmployeeController extends controller
{
    public function getListEmployee (){
        $objDepart = new Depar();
        $objDepart = $objDepart->all()->toArray();

        $ojbEmployee = new Employee();
        $list_employee = $ojbEmployee->all()->toArray();

        return view('Employee.list_employee')->with([
            'allDepart' => $objDepart,
            'list_employee'=>$list_employee
        ]);
    }
    public function getProfile($id){
        $profile = Employee::find($id);
        if(!$profile){
           return response()->json([
                'message'=> 'profile not found'
                ], 404); 
        }
        return response()->json($profile); 
    }
    public function searchEmployeeByName(){
        $name = "minh";
        if(!$name){
            return response()->json([
                'message'=> 'bad request'
                ], 400);
        }

        $results = Employee::findByName($name);
        return response()->json(['info'=>[], 'result'=>$results]);
    }
}