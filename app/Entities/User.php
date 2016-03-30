<?php

/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 18:58
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends  Model
{
    protected $table = 'users';

    protected $fillable = ['name','email','password'];

    public function role(){
        return $this->hasOne();
    }
}