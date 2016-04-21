<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 01/04/2016
 * Time: 11:10
 */

namespace App\Http\Controllers;

use App\Http\Requests\newDepartmentRequest;
use App\Models\Depar;
use App\Models\Employee;

class DepartmentControler extends Controller {
    private function removeFromDepartment($ems, $department){
        $saved = 0;
        foreach ($ems as $em) {
            $employee = Employee::find($em);
            if($employee && $employee->depar_id == $department){
                $employee->removeDepartment();
                $saved  += $employee->save();
            }
        }
        return ($saved==sizeof($ems));
    }
    public function getListdepart(){
        $objDepart = new Depar();
        $objDepart = $objDepart->all()->toArray();

        $ojbEmployee = new Employee();
        $list_employee = $ojbEmployee->all()->toArray();

        return view('Department.List_department')->with([
            'allDepart' => $objDepart
        ]);
    }
    public function new_department(){
        $ojbEmployee = new Employee();
        $list_employee = $ojbEmployee->all()->toArray();
        return view('Department.new_department')->with('employee_name',$list_employee);
    }
    public function postNewDepartment(newDepartmentRequest $request){

        $department = new Depar();
        $department->Dep_name = $request->DepartmentName;
        $department->Dep_master = $request->depMaster;
        $department->Dep_Phone = $request->DepartmentPhone;
        $department->Dep_number = $request->RoomNumber;

        $department->save();
        return redirect()->route('listdepartment');
    }

    public function postEditDepartment(newDepartmentRequest $request){
        $id = $request->input('depId');
        if(!$id){
            return response()->json([
                'message' => 'bad request',
            ], 400);
        }

        $department = Depar::find($id);
        if(!$department){
            return response()->json([
                'message' => 'department not found',
            ], 404);
        }

        $department->Dep_name = $request->DepartmentName;
        $department->Dep_master = $request->depMaster;
        $department->Dep_Phone = $request->DepartmentPhone;
        $department->Dep_number = $request->RoomNumber;
        $saved = $department->save();
        if(!$saved){
            return response()->json([
                'message' => 'object can not be saved',
            ], 500);
        }

        $ems = $request->removeList;
        if(sizeof($ems) > 0){
            $done = $this->removeFromDepartment($ems, $id);
            if(!$done){
                return response()->json([
                    'message' => 'object can not be saved',
                ], 500);       
            }
        }
        $employees = Employee::where('depar_id',$id)->get(array('id','name'));
        $data = array('dep' => $department, 'employees' => $employees);
        return response()->json($data);
    }

    public function getDepartmentDetails($id){
        $department = Depar::find($id);
        if(!$department){
            return response()->json([
                'message' => 'department not found',
            ], 404);
        }
        $employees = Employee::where('depar_id',$id)->get(array('id','name'));
        $data = array('dep' => $department, 'employees' => $employees);
        return response()->json($data);
    }
}