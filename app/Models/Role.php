<?php



/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 30/03/2016
 * Time: 19:17
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name','role_id'];


}