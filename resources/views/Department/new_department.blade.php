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
                <input type="text" name="DepartmentName" id="DepartmentName" class="form-control" placeholder="Department Name" value="{{old('DepartmentName')}}">
                @if($errors->has("DepartmentName"))
                    @foreach($errors->get("DepartmentName") as $error)
                        <div class="form-hint form-hint-error">{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="RoomNumber" class="col-lg-offset-1 col-sm-3 control-label"> Room Number</label>
            <div class="col-sm-6">
                <input type="text" name="RoomNumber" id="RoomNumber" class="form-control" placeholder="Room Number"  value="{{old('RoomNumber')}}">
                @if($errors->has("RoomNumber"))
                    @foreach($errors->get("RoomNumber") as $error)
                        <div class="form-hint form-hint-error">{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="DepartmentPhone" class="col-lg-offset-1 col-sm-3 control-label"> Office Phone</label>
            <div class="col-sm-6">
                <input type="text" name="DepartmentPhone" id="DepartmentPhone" class="form-control" placeholder="Office Phone @xxx.com">
                @if($errors->has("DepartmentPhone"))
                    @foreach($errors->get("DepartmentPhone") as $error)
                        <div class="form-hint form-hint-error">{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-offset-1 col-sm-3 control-label"> Manager</label>
            <div class="col-sm-6">
                <select class="form-control" name="depMaster">
                    @foreach($employee_name as $list_employee)
                    	@if(old('depMaster') == $list_employee['id'])
                    	<option value="{{$list_employee['id']}}" selected>
                    	@else
                    	<option value="{{$list_employee['id']}}">
                    	@endif
                        {{$list_employee['name']}}
                        </option>
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
    </form>
    </div>
</div>
@stop