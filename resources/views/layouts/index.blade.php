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

<body style="padding-top: 50px">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inner I_nav navbar-fixed-top">
                <div class="topbar I_topbar ">
                    <div class="header-left  ">
                        <div class="topnav ">
                            <ul class="header-menu nav navbar-nav I_header-menu">
                                <li><a href="#" class="toggle-sidebar-top"><i class="icon-home"></i> <span>Home</span></a></li>
                                <li><a href="#I_department"><i class="glyphicon glyphicon-list-alt"></i> <span>List Department</span></a></li>
                                <li><a href="#I_employee"><i class="glyphicon glyphicon-user"></i><span> List Employee</span></a></li>

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
    <div class="container">
        <div class="row">
            <main>
                <div class="top-main col-md-12">

                </div>
                <div class="I_departmemnt col-md-12" id="I_department">
                    @foreach($allDepart as $alldepart)
                        <div class="I_list_depart col-md-4">
                            <div class="I_depart_number col-md-4 ">
                                <h2>{{$alldepart['Dep_number']}}</h2>
                            </div>
                            <div class="I_depart_detail col-md-8">
                                <ul class="nav">
                                    <li>Name: {{$alldepart['Dep_name']}}</li>
                                    <li>Phone: {{$alldepart['Dep_Phone']}}</li>
                                    <li>Master: {{$alldepart->master->name}}</li>
                                </ul>
                            </div>
                            <div class="I_depart_employ col-md-12">
                                <h3> Nhân viên</h3>
                                {{--*/ $dem = 1 /*--}}
                                @foreach($allEmploy as $employ)
                                    <ul class="nav">
                                        @if($employ['depar_id'] == $alldepart['id'])
                                        <li> {{$dem}} </li>
                                            <li><a> {{$employ['name']}} - {{$employ['job_title']}}</a></li>
                                            {{--*/  $dem++ /*--}}
                                       @endif
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="I_employee" id="I_employee">
                    @foreach($allDepart as $alldepart)
                        {{--*/ $dem = 1 /*--}}
                        @foreach($allEmploy as $employ)
                            <ul>
                                @if($employ['depar_id'] == $alldepart['id'])
                                    <li> {{$dem}} </li>
                                    <li> {{$employ['name']}}</li>
                                    <li> {{$alldepart['Dep_name']}}</li>
                                    <li>{{$employ['job_title']}}</li>
                                    <li>{{$employ['adress']}}</li>
                                    <li>{{$employ['phone']}}</li>
                                    <li>{{$employ['mobile']}}</li>
                                    <li>{{$employ['email']}}</li>
                                    <li>{{$employ['sex']}}</li>
                                    <li>{{$employ['type']}}</li>
                                    <li>{{$employ['wage']}}{{$employ['wage_cur']}}</li>
                                    <li>{{$employ['work_from']}}</li>
                                    {{--*/  $dem++ /*--}}
                                @endif
                            </ul>
                        @endforeach
                    @endforeach
                </div>

            </main>
            <footer>

            </footer>
        </div>
    </div>
</body>
</html>