<?php

/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 18:58
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends  Model
{
    protected $table = 'users';
    protected $imageFolder = '/uploads/admin_img/';
    protected $imageFile = null;
    protected $imageExt = null;
    protected $fillable = ['name','email','password', 'image'];

    public function role(){
        return $this->hasOne();
    }

    public function saveWithImage(){
        $ret = $id = $this->save();
        if(!$this->imageFile) return $ret;
        $file = $this->imageFile;
        $fileName = 'admin_pic'.$this->id.'.'.$this->imageExt;
        $filePath = public_path().$this->imageFolder;
        $move = $file->move($filePath, $fileName);
        if($move) {
        	$this->image = $fileName;
        	$this->save();
    	}
        return $move; 
    }
    public function setImage($file){
        $this->imageFile = $file;
        $this->imageExt = $file->getClientOriginalExtension();
    }
}