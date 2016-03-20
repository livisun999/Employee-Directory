<?php

namespace App\Http\Controllers;



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

        if (Auth::attempt([ 'name' => $request->username, 'password' => $request->password,'role_id'=>1 ]) ) {
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
}