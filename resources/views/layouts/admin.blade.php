<!DOCTYPE html>
<html>
<head>
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

</head>
<body>
@section('main-parent')
<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="dashboard.html"></a>
        </h1>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-top big-img">
            <div class="user-image">
                <img src="public/assets/Admin/images/profil_page/friend8.jpg" class="img-responsive img-circle" alt="friend 8">
            </div>
            <h4>Bryan Raynolds</h4>
            <div class="dropdown user-login">
                <form action="search-result.html" method="post" class="searchform" id="search-results">
                    <input class="form-control" name="keyword" placeholder="Search..." type="text">
                </form>
            </div>
        </div>

        <ul class="nav nav-sidebar">
            <li class=" nav-active active"><a href="{{ URL::to('dashboard') }}"><i class="icon-home"></i><span>Admin Manager</span></a></li>
            <li class="nav-parent">
                <a href="{{ URL::to('newadmin') }}" class="test_"><i class="icon-puzzle"></i><span>New administrator</span> </a>
            </li>
            <li class="nav-parent">
                <a href="{{URL::to('ListAdmin')}}"><i class="icon-bulb"></i><span> List Admintrator</span> </a>
            </li>
            <li class="nav-parent">
                <a href="{{URL::to('profile_admin')}}"><i class="icon-screen-desktop"></i><span>Profile</span> </a>

            </li>
        </ul>

        <ul class="nav nav-sidebar">
            <li class=" nav-active active"><a href="dashboard.html"><i class="icon-home"></i><span>Department management </span></a></li>
            <li class="nav-parent">
                <a href="#"><i class="icon-puzzle"></i><span>Add department</span> </a>
            </li>
            <li class="nav-parent">
                <a href="{{URL::to('listdepartment')}}"><i class="icon-bulb"></i><span> List departments</span> </a>
            </li>


        </ul>

        <ul class="nav nav-sidebar">
            <li class=" nav-active active"><a href="dashboard.html"><i class="icon-home"></i><span>Employee management  </span></a></li>
            <li class="nav-parent">
                <a href="#"><i class="icon-puzzle"></i><span>New administrator</span> </a>
            </li>
            <li class="nav-parent">
                <a href="#"><i class="icon-bulb"></i><span> List Admintrator</span> </a>
            </li>
            <li class="nav-parent">
                <a href=""><i class="icon-screen-desktop"></i><span>Profile</span> </a>

            </li>
        </ul>
    </div>
</div>

<div class="main-content">
    <!-- BEGIN TOPBAR -->
    <div class="topbar">
        <div class="header-left">
            <div class="topnav">
                <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                <ul class="nav nav-icons">
                    <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li>
                    <li><a href="mailbox.html"><span class="octicon octicon-mail-read"></span></a></li>
                    <li><a href="#"><span class="octicon octicon-flame"></span></a></li>
                    <li><a href="builder-page.html"><span class="octicon octicon-rocket"></span></a></li>
                </ul>
            </div>
        </div>
        <div class="header-right">
            <ul class="header-menu nav navbar-nav">
                <li class="dropdown" id="user-header">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img src="public/assets/Admin/images/profil_page/friend8.jpg" alt="user image">
                        <span class="username">Hi, {{Auth::user()->name}}</span>
                    </a>
                </li>
                <li class="logout_Admin">
                    <a href="{{ URL::to('logout') }}"><i class="icon-logout"></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- header-right -->
    </div>
    <div class="page-content page-thin ">
        <div class="row">
            @yield('content')
        </div>
    </div> <!-- end .page-content-->
</div> <!-- end .main-content-->

</body>
</html>
@show
@section('script_')
    
@show

