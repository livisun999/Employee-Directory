@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row form_add_new">
        <form action='postNewAdmin' method="post" id="form_add_new_admin" name="form_add_new_admin" class="form-horizontal col-sm-8">
            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{!!  csrf_token() !!}">
            <h1> Add New Administrator </h1>
            <div class="form-group input_user ">
                <label for="username" class="col-lg-offset-1 col-sm-3 control-label"> Username </label>
                <div class="col-sm-7">
                    <input type="text" name="username" id="username" class="form-control" placeholder="UserName">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-offset-1 col-sm-3 control-label"> Password </label>
                <div class="col-sm-7">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-lg-offset-1 col-sm-3 control-label"> Re-Password </label>
                <div class="col-sm-7">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Password">
                </div>
            </div>

            <div class="form-group">
                <label for="Email" class="col-lg-offset-1 col-sm-3 control-label"> Email</label>
                <div class="col-sm-7">
                    <input type="email" name="Email" id="Email" class="form-control" placeholder="YourEmail@xxx.com">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-9">
                    <button type="reset" class="btn btn-default"> Reset </button>
                    <button type="submit" class="btn btn-primary"> Creat </button>

                </div>
            </div>
            <div class="error_login">
                @if ( $errors->any() )
                    <ul>
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
        $("#form_add_new_admin").validate({
            rules: {
                username: {
                    required: true,
                    rangelength: [2,50]
                },
                password: {
                    required: true,
                    rangelength: [6,50]
                },
                password_confirmation:{
                    required: true,
                    rangelength: [6,50],

                },
                Email:{
                    required: true,
                },
            },
            messages: {
                username: {
                    required: "Please enter the Username",
                    rangelength: "The username is the wrong length"
                },
                password: {
                    required: "Please enter the Password",
                    rangelength: " The Password is the wrong length"
                },
                password_confirmation:{
                    required: "Please enter the Re-Password",
                    rangelength: " The Password is the wrong length",

                },
                Email:{
                    required:"Please enter the Email",
                },

            }
        });
    });
</script>
@stop