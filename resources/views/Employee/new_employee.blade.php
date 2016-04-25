@extends('layouts.admin')
@section('title',' New Administrator')
@section('content')

    <div class="container">
        <div class="row form_add_new">
            <form action='postNewEmployee' method="post" id="form_add_new_employee" name="form_add_new_employee" class="form-horizontal col-sm-8">
                {!! csrf_field() !!}
                <input type="hidden" name="_token" value="{!!  csrf_token() !!}">
                <h1> Add New Employee </h1>
                <div class="form-group input_user ">
                    <label for="Em_name" class="col-lg-offset-1 col-sm-2 control-label"> Name </label>
                    <div class="col-sm-7">
                        <input type="text" name="Em_name" id="Em_name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_mail" class="col-lg-offset-1 col-sm-2 control-label"> Email</label>
                    <div class="col-sm-7">
                        <input type="text" name="Em_mail" id="Em_mail" class="form-control" placeholder="YourEmail@xxx.com">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Em_phone" class="col-lg-offset-1 col-sm-2 control-label"> Phone</label>
                    <div class="col-sm-7">
                        <input type="text" name="Em_phone" id="Em_phone" class="form-control" placeholder="Your Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_" class="col-lg-offset-1 col-sm-2 control-label"> Phone</label>
                    <div class="col-sm-7">
                        <input type="text" name="Em_phone" id="Em_phone" class="form-control" placeholder="Your Phone">
                    </div>
                </div>
                <div class="form-group form_bt">
                    <div class="col-sm-offset-3 col-sm-9">
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
                    yourname: {
                        required: true,
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
                    yourname: {
                        required: "Please enter the Your name",
                    },

                    Email:{
                        required:"Please enter the Email",
                    },

                }
            });
        });
    </script>
@stop