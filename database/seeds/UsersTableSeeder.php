<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Role;

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
    }
}
