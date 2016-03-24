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
            return view('admin.changePassword')->with('name',$request->username,'email','password');
        }
        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1,'changePass'=>1 ]) ) {
            $use_ = new User();
            return redirect()->route('dashboard');
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

    // New Admin
    public function postNewAdmin(addNewAdminRequest $request){
        $use = new User();
        $use->name= $request->username;
        $use->password = Hash::make($request->password);
        $use->email = $request->Email;
        $use->role_id = 1;
        $use->changePass = 0;
        $use->remember_token = $request->_token;

        $use->save();

        $add_email = $request->Email;
        // Mail To new Admin
        Mail::send('admin.wellcome', array('email'=>$request->Email, 'name'=>$request->username, 'password'=>$request->password), function($message){
            $message->to(Input::get('Email'))->subject('Welcome to Employee Directory. !');
        });

        return redirect()->route('ListAdmin')->with(['flash_level'=>'success','flash_message'=>'Success Complate Add New Admin']);

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
        if (Auth::attempt([ 'name' => $name_, 'password' => $current_pass]) &&
            ((!empty($getname)) && ($New_pass === $Re_pass))) {
                $getname->name= $name_;
                $getname->password = Hash::make($New_pass);
                $getname->changePass = 1;
                $getname->save();
                return view('admin.dashboard');
        }
    }

    public function getListAdmin(){
        $objUser = new USer();
        $allUser = $objUser->all()->toArray();
        return view('admin.ListAdmin')->with('allUsers',$allUser);
    }
}