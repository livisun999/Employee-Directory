<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 22:30
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depar extends Model
{
    protected $table = 'Depar';

    protected $fillable = ['Dep_name','Dep_master','Dep_phone','Dep_number'];

}