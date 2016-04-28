<?php

namespace App\Http\Controllers;



use App\Http\Requests\changePasswordRequest;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\addNewAdminRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Mail;

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

            return Redirect()->route('changePassword');
        }
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1,'changePass'=>1 ]) ) {
            $use_ = new User();
            return redirect()->route('listdepartment');
        }

        return redirect()->back()->withInput();
        echo $request->username;

    }
    public function getResign(){
        return view('resign');
    }
    public function dashboard(){
        return view('admin.index');

    }
    public function getLogout() {
        Auth::logout(); // logout user
        return Redirect()->route('login'); //redirect back to login
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
    public function check_is_acc($request){
        $objUser = new USer();
        $allUser = $objUser->all()->toArray();
        foreach( $allUser as $users ){
            if($request->username == $users['name']){
               return false;
            }
        }
        return true;
    }
    function RandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    // New Admin
    public function postNewAdmin(addNewAdminRequest $request){
        if($this->check_is_admin() && $this->check_is_acc($request)) {
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
            return redirect()->route('newadmin');
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
            return redirect()->route('dashboard');

        }
        else{
            return Redirect()->route('changePassword');
        }

    }

    public function getListAdmin(){
        $objUser = new USer();
        $allUser = $objUser->all()->toArray();
        return view('admin.ListAdmin')->with('allUsers',$allUser);
    }
    public function get_profile_admin(){
        return view('admin.profile_admin');
    }

    public function post_profile_admin(){

    }
}