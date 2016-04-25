@extends('layouts.admin')
@section('title', 'New Deprtment')
@section('content')
<div class="new_department container form_add_new">
    <div class="row">
    <form action='postNewDepartment' method="post" id="form_add_new_admin" name="form_add_new_admin" class="form-horizontal col-sm-8">
        {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{!!  csrf_token() !!}">
        <h1> New Department </h1>


        <div class="form-group input_user ">
            <label for="DepartmentName" class="col-lg-offset-1 col-sm-3 control-label"> Department Name </label>
            <div class="col-sm-6">
                <input type="text" name="DepartmentName" id="DepartmentName" class="form-control" placeholder="Department Name">
            </div>
        </div>

        <div class="form-group">
            <label for="RoomNumber" class="col-lg-offset-1 col-sm-3 control-label"> Room Number</label>
            <div class="col-sm-6">
                <input type="text" name="RoomNumber" id="RoomNumber" class="form-control" placeholder="Room Number">
            </div>
        </div>

        <div class="form-group">
            <label for="DepartmentPhone" class="col-lg-offset-1 col-sm-3 control-label"> Office Phone</label>
            <div class="col-sm-6">
                <input type="text" name="DepartmentPhone" id="DepartmentPhone" class="form-control" placeholder="Office Phone @xxx.com">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-offset-1 col-sm-3 control-label"> Manager</label>
            <div class="col-sm-6">
                <select class="form-control" name="depMaster">
                    @foreach($employee_name as $list_employee)
                        <option>{{$list_employee['name']}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group form_bt">
            <div class="col-sm-offset-4 col-sm-9">
                <button type="reset" class="btn btn-default"> Reset </button>
                <button type="submit" class="btn btn-primary"> Creat Department </button>

            </div>
        </div>

        <div class="error_login">
            @if ( $errors->any() )
                <ul class="form_error">
                    <h2> * Form Error </h2>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </form>
    </div>
</div>
@stop