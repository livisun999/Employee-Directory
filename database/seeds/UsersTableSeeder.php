<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Depar;
use App\Models\Employee;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'=>'Administrator',
            'role_id'=>1
        ]);
        User::create([
            'name'=>'Admin1',
            'email'=>'Admin@gmail.com',
            'password'=>\Hash::make('admin1'),
            'role_id'=>$role->id,
            'yourname'=>'Admin1',
            'changePass'=>0
        ]);

        Depar::create(array(
            'Dep_name'=>'Phong nhan Su',
            'Dep_master'=>'vuong',
            'Dep_Phone' =>  '0972114187',
            'Dep_number'=>'1'
        ));
        Depar::create(array(
            'Dep_name'=>'Phong Hanh Chinh',
            'Dep_master'=>'minh',
            'Dep_Phone' =>  '0972114188',
            'Dep_number'=>'2'
        ));


        Employee::create([
            'name'=>'vuong',
            'birthday'=>'1993/12/08',
            'phone'=> '0972114187',
            'email'=>'abc@gmail.com',
            'depar_id'=>'1'
        ]);
        Employee::create([
            'name'=>'minh',
            'birthday'=>'1995/12/12',
            'phone'=> '0972114188',
            'email'=>'minh@gmail.com',
            'depar_id'=>'2'
        ]);

    }
}
