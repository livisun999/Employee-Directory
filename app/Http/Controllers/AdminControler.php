<?php

namespace App\Http\Controllers;


use App\Models\Depar;
use App\Models\Employee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Mail;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\addNewAdminRequest;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\AdminProfileRequest;
use App\User;
use App\Models\User as Admin;
use Session;

class AdminControler extends controller {
    public function getLogin(){
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminLoginRequest $request)
    {
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1,'changePass'=>0 ]) ) {

            return Redirect()->route('changePassword')->with(['flash_level' => 'danger', 'flash_message' => 'please change password in first login']);;
        }
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1,'changePass'=>1 ]) ) {
            $use_ = new User();
            return redirect()->route('listdepartment')->with(['flash_level' => 'success', 'flash_message' => 'login Success']);;
        }

        return redirect()->route('login')->with(['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again'])->withInput();

    }
    public function getResign(){
        return view('resign');
    }
    public function dashboard(){
        $allDepart = Depar::allMaster();
        $allEmploy = Employee::allWithDep();

        return view('layouts.index')->with([
            'allDepart'=> $allDepart,
            'allEmploy'=> $allEmploy
        ]);
    }
    public function getLogout() {
        Auth::logout(); // logout user
        return Redirect()->route('dashboard'); //redirect back to login
    }
    public function getNewAdmin() {
        return view('admin.NewAdmin');
    }

    public  function check_is_admin(){
        $ad_us = User::find(Auth::user()->id);
        if($ad_us->role_id == 1){
            return true;
        }
        else{
            return false;
        }
    }
    public function check_is_acc_exist($username){
        return User::where(['username' => $username])->count() != 0;
    }
    public function check_is_email_exist($email){
        return User::where(['email' => $mail])->count() != 0;
    }

    function RandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    // New Admin
    public function postNewAdmin(addNewAdminRequest $request){
        if($this->check_is_admin() && $this->check_is_acc_exist($request->username)&& $this->check_is_email_exist($request->Email)) {
            $use = new User();
            $use->name = $request->username;
            $new_pass = $this->RandomString();
            $use->password = Hash::make($new_pass);
            $use->email = $request->Email;
            $use->yourname = $request->yourname;
            $use->role_id = 1;
            $use->changePass = 0;
            $use->remember_token = $request->_token;

            $use->save();

            $add_email = $request->Email;
            // Mail To new Admin
            Mail::send('admin.wellcome', array('email' => $request->Email, 'name' => $request->username, 'password' => $new_pass), function ($message) {
                $message->to(Input::get('Email'))->subject('Welcome to Employee Directory. !');
            });
            echo 'Success';
            return redirect()->route('ListAdmin')->with(['flash_level' => 'success', 'flash_message' => 'Success Complate Add New Admin']);
        }
        else{
            if(!$this->check_is_acc_exist($request->username)){
                return redirect()->route('newadmin')->with(['flash_level' => 'danger', 'flash_message' => 'account is existing']);
            }else{
                if(!$this->check_is_email_exist($request->Email)){
                    return redirect()->route('newadmin')->with(['flash_level' => 'danger', 'flash_message' => 'email is existing']);
                }
            }
            return redirect()->route('newadmin')->with(['flash_level' => 'danger', 'flash_message' => 'account and email is existing']);
        }
    }
    public function getChanePassword (){
        return view('admin.changePassword');
    }

    // function edit Pasword
    public function  edit (){

    }
    public function postChangePassword (changePasswordRequest $request){
       // $Us_Change_pass = new User();

        $name_ = $request->username;
        $current_pass = $request->Current_password;
        $New_pass = $request->New_password;
        $Re_pass = $request->New_password_confirmation;

        $getname = User::find(Auth::user()->id);

        if(Auth::attempt(['name'=>Auth::user()->name,'password' => $request->Current_password]) ) {

            $getname->password = Hash::make($New_pass);
            $getname->changePass = 1;
            $getname->save();

            Session::flash('flash_message', "your password has been changed successfuly");
            Session::flash('flash_level', 'success');
            return redirect()->route('dashboard');

        }
        else{
            return Redirect()->route('changePassword')->with(['flash_level' => 'danger', 'flash_message' => 'Change password error, please check current password or new password']);
        }

    }

    public function getListAdmin(){
        $objUser = new USer();
        $allUser = $objUser->all()->toArray();
        return view('admin.ListAdmin')->with('allUsers',$allUser);
    }
    public function get_profile_admin(){
    	$admin = User::find(Auth::user()->id);
        return view('admin.profile_admin')->with('admin', $admin);
    }

    public function post_profile_admin(AdminProfileRequest $request){

    	if (!Auth::attempt(['password' => $request->password])){
    		Session::flash('flash_level', "warning");
    		Session::flash('flash_message', "your password was not correct");
    	} elseif(
    		Auth::user()->email != $request->email &&
    	 	$this->check_is_email_exist($request->username)
    	 	){
    		Session::flash('flash_level', "warning");
    		Session::flash('flash_message', "this email has been used by another user");
    	} else {
    		$id = Auth::user()->id;
    		$admin = Admin::find($id);
    		$request->bindTo($admin);
    		if($admin->saveWithImage()){
    			Session::flash('flash_message', 'your profile has been updated successfuly');
    			Session::flash('flash_level', "success");
    		} else{
    			Session::flash('flash_message', 'can not save your update');
    			Session::flash('flash_level', "danger");
    		}
    	}
    	return redirect()->back();
    }
}