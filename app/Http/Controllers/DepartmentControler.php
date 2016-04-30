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
use App\Http\Requests\DeletionRequest;
use App\Models\Depar;
use App\Models\Employee;
use Session;

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
        $allDepart = Depar::allMaster(['name', 'id']);
        return view('Department.List_department')->with([
            'allDepart' => $allDepart
        ]);

    }
    public function getNew_department(){
        $ojbEmployee = new Employee();
        $list_employee = $ojbEmployee->all()->toArray();
        return view('Department.new_department')->with('employee_name',$list_employee);
    }
    public function check_is_depart_exist($request){
        return Depar::where([
        	"Dep_name" => $request->DepartmentName
        	])->count() != 0;
    }
    public function postNewDepartment(newDepartmentRequest $request){
        if(!$this->check_is_depart_exist($request)){
            $department = new Depar();
            $department->Dep_name = $request->DepartmentName;
            $department->Dep_master = $request->depMaster;
            $department->Dep_Phone = $request->DepartmentPhone;
            $department->Dep_number = $request->RoomNumber;
            $check_sussces = $department->save();
            if($check_sussces){
            	Session::flash("flash_message", "create department successfuly!");
            	Session::flash("flash_level", "success");
                return redirect()->route('listdepartment');
            } else {
            	Session::flash("flash_message", "can not save department!");
            	Session::flash("flash_level", "danger");
                return redirect()->route('listdepartment')->with(['flash_level' => 'succes', 'flash_message' => 'success Complate Add New Department ']);
            }
        } else {
        	Session::flash("flash_message", "department's already exits");
        	Session::flash("flash_level", "danger");	
        }
        return redirect()->route('newdepartment');


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

    public function deleteDepartment(DeletionRequest $request){
    	$id = $request->id;
    	$dep = Depar::findOrFail($id);
    	if($dep->delete()){
    		return AjaxResponse::okMessage('department has been removed');
    	} else {
    		return AjaxResponse::error('unable to delete department');
    	}
    }
}