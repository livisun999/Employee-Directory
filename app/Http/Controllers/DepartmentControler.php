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
        foreach ($ems as $em) {
            $employee = Employee::find($em);
            if($employee && $employee->depar_id == $department){
                $employee->removeDepartment();
                $employee->save();
            }
        }
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
        $department = Depar::find($id);
        $department->Dep_name = $request->DepartmentName;
        $department->Dep_master = $request->depMaster;
        $department->Dep_Phone = $request->DepartmentPhone;
        $department->Dep_number = $request->RoomNumber;
        $department->save();

        $ems = $request->removeList;
        if(sizeof($ems) > 0){
            $this->removeFromDepartment($ems, $id);
        }
        $employees = Employee::where('depar_id',$id)->get(array('id','name'));
        $data = array('dep' => $department, 'employees' => $employees);
        return json_encode($data);
    }

    public function getDepartmentDetails($id){
        $department = Depar::find($id);
        $employees = Employee::where('depar_id',$id)->get(array('id','name'));
        $data = array('dep' => $department, 'employees' => $employees);
        return json_encode($data);
    }
}