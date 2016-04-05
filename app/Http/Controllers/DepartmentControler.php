<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 01/04/2016
 * Time: 11:10
 */

namespace App\Http\Controllers;

use App\Models\Depar;
use App\Models\Employee;

class DepartmentControler extends Controller {

//    public function getListdepart(){
//       return view('Department.List_department');
//    }
    public function getListdepart(){
        $objDepart = new Depar();
        $objDepart = $objDepart->all()->toArray();

        $ojbEmployee = new Employee();
        $list_employee = $ojbEmployee->all()->toArray();

        return view('Department.List_department')->with([
            'allDepart' => $objDepart,
            'list_employee'=>$list_employee
        ]);
    }
}