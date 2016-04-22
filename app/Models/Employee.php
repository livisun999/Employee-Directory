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

    protected $fillable = ['name','image', 'birthday','phone','email', 'mobile', 'office', 'adress', 'job_title', 'sex', 'type', 'status', 'wawe', 'wage_cur', 'work_from','depar_id'];

    public function depar(){
        return $this->hasOne();
    }
    public function removeDepartment(){
    	$this->depar_id = NULL;
     	return true;
    }
    public static function findByName($name){
        $sql = "`name` LIKE '%:key%'
            ORDER BY CASE
                WHEN `name` = ':key' THEN 1
                WHEN `name` = ':key%' THEN 2
                WHEN `name` = '%:key' THEN 3
                WHEN `name` = '%:key%' THEN 4
                ELSE 5
            END, `name` ASC";
        $sql = str_replace(':key', $name, $sql);
    	$results = self::whereRaw($sql)->get();
    	return $results;
    } 
}