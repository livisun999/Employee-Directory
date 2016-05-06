<!DOCTYPE html>
<html>
    <head>
        <title> Đăng Nhập Hệ Thống Admin </title>
        <link href="{!! url('public/assets/Admin/css/bootstrap.css') !!}" rel="stylesheet">
        <link href="{!! url('public/assets/Admin/css/style_login.css') !!}" rel="stylesheet">
        <link href="{!! url('public/assets/Admin/css/customs.css') !!}" rel="stylesheet">
        <script type="text/javascript" src="public/assets/Admin/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="public/assets/Admin/js/jquery.validate.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">

                    <form action='postLogin' method="post" id="form_login_admin" name="form_login_admin" class="form-horizontal">
                    {!! csrf_field() !!}
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group input_user ">
                        <label for="username" class="col-lg-offset-1 col-sm-3 control-label"> Username </label>
                        <div class="col-sm-7">
                            <input type="text" name="username" id="username" class="form-control" placeholder="UserName" value="{{old('username')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-offset-1 col-sm-3 control-label"> Password </label>
                        <div class="col-sm-7">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-4 col-sm-7">
                            <label>
                                <input type="checkbox"> Remember password
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-9">
                            <button type="submit" class="btn btn-primary"> Login </button>
                        </div>
                    </div>
                </form>
                <div class="error_login">
                    @if ( $errors->any() )
                        <ul class="form_error">
                            <h2> Form Error * </h2>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                        <div class="col-md-12">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-{!! Session::get('flash_level') !!}">
                                    {!! Session::get('flash_message') !!}
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form_login_admin").validate({
            rules: {
                username: {
                    required: true,
                    rangelength: [2,50]
                },
                password: {
                    required: true,
                    rangelength: [6,50]
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
            }
        });
    });
</script>
