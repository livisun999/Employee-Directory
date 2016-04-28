<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 01/04/2016
 * Time: 11:10
 */

namespace App\Http\Controllers;

use App\Extentions\AjaxResponse;
use App\Http\Requests\newDepartmentRequest;
use App\Models\Depar;
use App\Models\Employee;

class DepartmentControler extends Controller {
    private function removeFromDepartment($ems, $department){
        $saved = 0;
        $dep = Depar::find($department);
        foreach ($ems as $em) {
            $employee = Employee::find($em);
            if($employee && $employee->depar_id == $department){
                $employee->removeDepartment();
                $saved  += $employee->save();
                if($em == $dep->Dep_master){
                    $dep->Dep_master = NULL;
                    $dep->save();
                }
            }
        }
        return ($saved==sizeof($ems));
    }
    public function getListdepart(){
<<<<<<< HEAD
        $objDepart = Depar::allMaster(['name', 'id']);
        return view('Department.List_department')->with('allDepart', $objDepart);
=======
        $allDepart = Depar::allMaster(['name', 'id']);
        return view('Department.List_department')->with([
            'allDepart' => $allDepart
        ]);
>>>>>>> b563f99f7770e58d5db4d2a4c7b468828be955e8
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
        $department = Depar::findOrFail($id);
        $department->Dep_name = $request->DepartmentName;
        $department->Dep_master = $request->depMaster;
        $department->Dep_Phone = $request->DepartmentPhone;
        $department->Dep_number = $request->RoomNumber;
        $saved = $department->save();
        $remov = $request->input("removeList");
        if(is_array($remov) && sizeof($remov) > 0){
            $this->removeFromDepartment($remov, $id);
        }
        $department->employees();
        $department->master(['name', 'id']);
        return AjaxResponse::ok($department, "department was updated");
    }

    public function getDepartmentDetails($id){
        $department = Depar::findOrFail($id);
        $department->master(['name', 'id']);
        $department->load('employees');
        return AjaxResponse::ok($department);
    }
}