<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

        Route::get('/login', ['as' => 'login', 'uses' => 'AdminControler@getLogin']);
        Route::post('/postLogin', ['as' => 'postLogin', 'uses' => 'AdminControler@postLogin']);

        Route::group(['middleware'=>'auth'], function(){

                // Route Admin

                Route::get('/postLogin', ['as' => 'postLogin', 'uses' => 'AdminControler@dashboard']);
                Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminControler@dashboard']);
                Route::get('/resign', ['as' => 'resign', 'uses' => 'AdminControler@getResign']);
                Route::get('logout', ['as' => 'logout', 'uses' => 'AdminControler@getLogout']);

                Route::post('postNewAdmin', ['as' => 'newAdmin', 'uses' => 'AdminControler@postNewAdmin']);
                Route::get('newadmin', ['as' => 'newadmin', 'uses' => 'AdminControler@getNewAdmin']);
                Route::get('ListAdmin', ['as' => 'ListAdmin', 'uses' => 'AdminControler@getListAdmin']);
                Route::get('changePassword', ['as' => 'changePassword', 'uses' => 'AdminControler@getChanePassword']);
                Route::post('postChangePassword', ['as' => 'postChangePassword', 'uses' => 'AdminControler@postChangePassword']);
                Route::get('profile_admin',['as'=>'profile_admin','uses'=>'AdminControler@get_profile_admin']);
                Route::post('profile_admin',['as'=>'profile_admin','uses'=>'AdminControler@post_profile_admin']);

                // route department

                Route::get('listdepartment',['as'=>'listdepartment','uses'=>'DepartmentControler@getListdepart']);

                Route::post('/postListDepartment',['as'=>'postListDepartment','uses'=>'DepartmentControler@postListDepartment']);
                Route::get('/newdepartment',['as=>newdepartment','uses'=>'DepartmentControler@new_department']);
                Route::post('/postNewDepartment',['as'=>'postNewDepartment','uses'=>'DepartmentControler@postNewDepartment']);
                Route::post('postEditDepartment', ['as' => 'postEditDepartment', 'uses'=>'DepartmentControler@postEditDepartment']);
                Route::get('getDepartmentDetails/{id}', ['as' => 'getDepartmentDetails', 'uses'=>'DepartmentControler@getDepartmentDetails']);
                // route for employee
                Route::get('listemployee',['as'=>'listemployee','uses'=>'EmployeeController@getListEmployee']);
                Route::get('searchemployee',['as'=>'searchemployee','uses'=>'EmployeeController@searchEmployeeByName']);
                Route::get('employee/profile/{id}', ['as'=>'emprofile', 'uses'=> 'EmployeeController@getProfile']);
                Route::get('newemployee',['as'=>'newemployee','uses'=>'EmployeeController@getNewEmployee']);
                Route::post('postnewemployee',['as'=>'postnewemployee','uses'=>'EmployeeController@postNewEmployee']);
                Route::post('employee/update/{id}', ['as'=>'emupdate', 'uses'=>'EmployeeController@updateProfile']);
        });



//    });

});
