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
            'image' => 'admin_pic1.jpg',
            'changePass'=>0
        ]);




        Employee::create([
            'name'=>'vương',
            'birthday'=>'1993/12/08',
            'phone'=> '0972114187',
            'email'=>'abc@gmail.com',
            'mobile'=>'0972114187',
            'office'=>'0972114187',
            'job_title'=>'trưởng phòng',
            'image'=> 'profile_pic2.jpg',
            'sex'=>'nam',
            'type'=>'full time',
            'adress'=>'Hà Nội, VN',
            'work_from'=>'2010/12/08',
            'wage'=>'2000000',
            'depar_id'=>'1'
        ]);
        Employee::create([
            'name'=>'minh',
            'birthday'=>'1995/12/12',
            'phone'=> '0972114188',
            'email'=>'minh@gmail.com',
            'image'=> 'profile_pic1.jpg',
            'mobile'=>'0972114187',
            'office'=>'0972114187',
            'job_title'=>'trưởng phòng',
            'sex'=>'nam',
            'type'=>'full time',
            'adress'=>'Hà Nội, VN',
            'work_from'=>'2010/12/08',
            'wage'=>'2000000',
            'depar_id'=>'2'
        ]);
        Employee::create([
            'name'=>'Thanh Lich',
            'birthday'=>'1996/12/12',
            'phone'=> '0972114199',
            'email'=>'thanhlich_ulis@gmail.com',
            'mobile'=>'0972114187',
            'office'=>'0972114187',
            'job_title'=>'trưởng phòng',
            'sex'=>'nam',
            'type'=>'full time',
            'adress'=>'Hà Nội, VN',
            'work_from'=>'2010/12/08',
            'wage'=>'2000000',
            'depar_id'=>'2'
        ]);
        Depar::create(array(
            'Dep_name'=>'Phòng nhân Sự',
            'Dep_Phone' =>  '0972114187',
            'Dep_number'=>'E-01',
            'Dep_master'=>1
        ));
        Depar::create(array(
            'Dep_name'=>'Phòng Hành Chính',
            'Dep_Phone' =>  '0972114188',
            'Dep_number'=>'B-02',
            'Dep_master'=>2
        ));
    }
}
