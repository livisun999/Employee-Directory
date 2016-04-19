<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 23:22
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = ['name','birthday','phone','email','depar_id'];

    public function depar(){
        return $this->hasOne();
    }
    public function removeDepartment(){
    	$this->depar_id = NULL;
     	return true;
    }
}