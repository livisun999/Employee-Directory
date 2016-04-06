@extends('layouts.admin')
@section('title',' - New Administrator')
@section('content')

<div class="container">
    <div class="row form_add_new">
        <form action='postNewAdmin' method="post" id="form_add_new_admin" name="form_add_new_admin" class="form-horizontal col-sm-8">
            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{!!  csrf_token() !!}">
            <h1> Add New Administrator </h1>
            <div class="form-group input_user ">
                <label for="username" class="col-lg-offset-1 col-sm-2 control-label"> Username </label>
                <div class="col-sm-7">
                    <input type="text" name="username" id="username" class="form-control" placeholder="UserName">
                </div>
            </div>


            <div class="form-group">
                <label for="yourname" class="col-lg-offset-1 col-sm-2 control-label"> Your Name</label>
                <div class="col-sm-7">
                    <input type="text" name="yourname" id="yourname" class="form-control" placeholder="your name">
                </div>
            </div>

            <div class="form-group">
                <label for="Email" class="col-lg-offset-1 col-sm-2 control-label"> Email</label>
                <div class="col-sm-7">
                    <input type="email" name="Email" id="Email" class="form-control" placeholder="YourEmail@xxx.com">
                </div>
            </div>
            <div class="form-group form_bt">
                <div class="col-sm-offset-4 col-sm-9">
                    <button type="reset" class="btn btn-default"> Reset </button>
                    <button type="submit" class="btn btn-primary"> Creat </button>

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
        $("#form_add_new_admin").validate({
            rules: {
                username: {
                    required: true,
                    rangelength: [2,50]
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

                Email:{
                    required:"Please enter the Email",
                },

            }
        });
    });
</script>
@stop