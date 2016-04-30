<!DOCTYPE html>
<html>
<head>
    <title> @yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Admin Control @yield('title')</title>
    <link href="{!! url('public/assets/Admin/css/bootstrap.css') !!}"rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/style.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/rtl.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/theme.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/ui.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/customs.css') !!}" rel="stylesheet">

    <script type="text/javascript" src="public/assets/Admin/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/jquery.validate.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="public/assets/Admin/plugins/noty/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/main.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inner I_nav navbar-fixed-top">
                <div class="topbar I_topbar ">
                    <div class="header-left  ">
                        <div class="topnav ">
                            <ul class="header-menu nav navbar-nav I_header-menu">
                                <li><a href="#" class="toggle-sidebar-top"><i class="icon-home"></i> <span>Home</span></a></li>
                                <li><a href="#neo1"><i class="glyphicon glyphicon-list-alt"></i> <span>List Department</span></a></li>
                                <li><a href="#neo2"><i class="glyphicon glyphicon-user"></i><span> List Employee</span></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="header-menu nav navbar-nav">
                            <li class="logout_Admin I_logout_Admin">
                                <a href="{{ URL::to('login') }}"><i class="glyphicon glyphicon-hand-right"></i><span>Login</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
            </nav>
        </div>
    </div>
            <main>
                <div class="top-main col-md-12 I_top-main" >
                    <h1 class="text-center"><strong><i> Wellcom to Employee Directory!</i></strong></h1>
                </div>
                <div class="backspace_ col-md-12" id="neo1">
                    <h1 class="text-center"> Department</h1>
                </div>
                <div class="container">
                    <div class="row">

                        <div class="I_departmemnt col-md-12" id="I_department" name="I_department">
                            @foreach($allDepart as $alldepart)
                                <div class="col-md-4">
                                    <div class="I_list_depart col-md-12">
                                        <div class="I_depart_number col-md-4 fix">
                                            <h2>{{$alldepart['Dep_number']}}</h2>
                                        </div>
                                        <div class="I_depart_detail col-md-8">
                                            <ul class="nav">
                                                <li>{{$alldepart['Dep_name']}}</li>
                                                <li>Phone: 0{{$alldepart['Dep_Phone']}}</li>
                                                <li>Master: {{$alldepart->master->name}}</li>
                                            </ul>
                                        </div>
                                        <div class="I_depart_employ col-md-12">

                                            <h3> List Employee</h3>
                                            {{--*/ $dem = 1 /*--}}
                                            <table class="table table-hover">
                                                @foreach($allEmploy as $employ)
                                                       @if($employ['depar_id'] == $alldepart['id'])
                                                       <tr>
                                                            <td class="col-md-1"> {{$dem}}) </td>
                                                            <td class="col-md-6"><a href="#{{$employ['id']}}"> {{$employ['name']}}</a></td>
                                                            <td class="col-md-4">{{$employ['job_title']}}</td>
                                                            {{--*/  $dem++ /*--}}
                                                       </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="backspace_ col-md-12">
                    <h1 class="text-center"> Employee</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="I_employee" id="neo2" name="I_employee">
                                {{--*/ $dem = 1 /*--}}
                                @foreach($allEmploy as $employ)
                                    <div class="col-md-4" id="{{$employ['id']}}">
                                        <div class="I_list_depart col-md-12">
                                            <div class="col-md-12 text-center">
                                                <img src="public/uploads/profile_img/{{$employ['image']}}" class="img-circle">
                                            </div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><strong>{{$employ['name']}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Department: </td>
                                                        <td>{{$alldepart['Dep_name']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Job Title:</td>
                                                        <td>{{$employ['job_title']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adress:</td>
                                                        <td>{{$employ['adress']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone: </td>
                                                        <td>{{$employ['phone']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile: </td>
                                                        <td>{{$employ['mobile']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email: </td>
                                                        <td>{{$employ['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sex: </td>
                                                        <td>{{$employ['sex']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Type: </td>
                                                        <td>{{$employ['type']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wage:</td>
                                                        <td>{{$employ['wage']}}{{$employ['wage_cur']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Work From: </td>
                                                        <td>{{$employ['work_from']}}</td>
                                                    </tr>
                                                        {{--*/  $dem++ /*--}}
                                                </table>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </main>
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
            <footer>
                <div class="F_infor">
                    <h4 class="text-center"> Developer by MVH Team!</h4>
                    <h5 class="text-center"> Contact to MVH Team: emplouyeedirectory@gmail.com </h5>
                    <h5 class="text-center"> Phone: 0972 114 187</h5>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });

        $('#scroll').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
</script>