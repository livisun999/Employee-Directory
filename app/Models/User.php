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
    protected $imageFloder '/uploads/admin_img/';
    protected $imageFile = null;
    protected $fillable = ['name','email','password', 'image'];

    public function role(){
        return $this->hasOne();
    }

<<<<<<< HEAD
=======
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
>>>>>>> f7e2782f119b3881a53ff1464bfe5cd5bc01fd69
}