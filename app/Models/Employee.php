<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 23:22
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Models\Depar;

class Employee extends Model
{
    protected $table = 'employee';
    protected $imageFolder = '/uploads/profile_img/';
    protected $imageFile;
    protected $imageExt;
    protected $fillable = ['name','image', 'birthday','phone','email', 'mobile', 'office', 'adress', 'job_title', 'sex', 'type', 'status', 'wawe', 'wage_cur', 'work_from','depar_id'];

    public function department($col = ["*"]){
        $this->department = Depar::find($this->depar_id, $col);
    }
    public static function allWithDep($col = ["*"]){
        $all = self::all();
        foreach ($all as $em) {
            $em->department($col);
        }
        return $all;
    }
    public function removeDepartment(){
    	$this->depar_id = NULL;
     	return true;
    }
    public function saveWithImage(){
        $ret = $id = $this->save();
        if(!$this->imageFile) return $ret;
        $file = $this->imageFile;
        $fileName = 'profile_pic'.$this->id.'.'.$this->imageExt;
        $filePath = public_path().$this->imageFolder;
        $this->image = $fileName;
        $this->save();
        return $file->move($filePath, $fileName);
    }
    public function setImage($file){
        $this->imageFile = $file;
        $this->imageExt = $file->getClientOriginalExtension();
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