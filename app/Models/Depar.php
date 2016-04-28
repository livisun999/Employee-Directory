<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 22:30
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Depar extends Model
{
    protected $table = 'Depar';
    protected $fillable = ['Dep_name','Dep_master','Dep_phone','Dep_number'];
    /*
    * @Override
    */
    public function employees(){
    	return $this->hasMany('App\Models\Employee');
    }

    public function master($col = ["*"]){
    	$this->master = Employee::find($this->Dep_master, $col);
    }

    public static function allMaster($col = ["*"]){
    	$all = self::all();
    	foreach ($all as $dep) {
    		$dep->master($col);
    	}
    	return $all;
    }
}