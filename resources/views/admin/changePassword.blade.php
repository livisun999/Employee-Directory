@extends('layouts.admin')
@section('title','Change Password')
@section('content')
<div class="container">
    <div class="row form_add_new">
        <form action='postChangePassword' method="post" id="ChangePassword" name="ChangePassword"
              class="form-horizontal col-sm-8">
            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{{  csrf_token() }}">
            <h1> Change Password </h1>

            <div class="form-group">
                <label for="username" class="col-lg-offset-1 col-sm-3 control-label"> User Name </label>
                <div class="col-sm-7">
                    <input type="text" name="username" id="username" class="form-control" value="{{Auth::user()->name}}" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="Current_password" class="col-lg-offset-1 col-sm-3 control-label"> Current Password </label>
                <div class="col-sm-7">
                    <input type="password" name="Current_password" id="Current_password" class="form-control"
                           placeholder="******">
                </div>
            </div>
            <div class="form-group">
                <label for="New_password" class="col-lg-offset-1 col-sm-3 control-label"> New Password </label>
                <div class="col-sm-7">
                    <input type="password" name="New_password" id="New_password" class="form-control"
                           placeholder="******">
                </div>
            </div>
            <div class="form-group">
                <label for="New_password_confirmation" class="col-lg-offset-1 col-sm-3 control-label">
                    Re-Password </label>
                <div class="col-sm-7">
                    <input type="password" name="New_password_confirmation" id="New_password_confirmation"
                           class="form-control" placeholder="******">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-9">
                    <button type="reset" class="btn btn-default"> Reset</button>
                    <button type="submit" class="btn btn-primary" id="update"> Update</button>

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
@section('script_')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#ChangePassword').validate({
                rules: {
                    Current_password: {
                        required: true,
                        rangelength: [6, 50]
                    },
                    New_password: {
                        required: true,
                        rangelength: [6, 50]
                    },
                    New_password_confirmation: {
                        required: true,
                        equalTo: "#New_password"
                    },

                },
                messages: {
                    Current_password: {
                        required: "Please enter the Current Password",
                    },
                    New_password: {
                        required: "Please enter the New Password",
                        rangelength: "Password is too sort",
                    },
                    New_password_confirmation: {
                        required: "Please enter the Re-Password",
                        equalTo: "Please Check Password and Re-Password"
                    },
                }
            });


            $('#New_password_confirmation').change(function(){
            	var pwd = $('#New_password').val();
            	var error = null;
            	if(pwd == ""){
            		error = "please enter password first";
            	} else if(pwd == this.value) {
            		//remov err
            		//tick
            	} else {
            		error = "Re-Password does not match";
            	}
            });
        });
    </script>
@stop