@extends('layouts.admin')
@section('title', ' Profile')
@section('content')
<div class="profile_ col-sm-12">
    <form action='postChangePassword' method="post" id="ChangePassword" name="ChangePassword" class="form-horizontal col-sm-12 ">
        {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{{  csrf_token() }}">

        <div class="col-sm-4 pr_left" >
            <div class="user-img">
                <img src="public/assets/Admin/images/profil_page/friend8.jpg" class='img-circle col-sm-10'>
            </div>
                <div class="img_change col-sm-7 col-lg-offset-2">
                    <p> Change image profile </p>
                    <input type="file" value="Change">
                </div>
        </div>
        <div class="col-sm-7 pr_right col-sm-offset-0">

            <div class="form-group col-sm-12">
                   <h1 class="col-sm-5 col-sm-offset-3">{{Auth::user()->name}} </h1>
            </div>
            <div class="form-group">
                <label for="yourname" class="col-sm-3 control-label"> Your name</label>
                <div class="col-sm-6 admin_name">
                    <input type="text" name="yourname" id="yourname" class="form-control col-sm-10" value="{{Auth::user()->yourname}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="Email_Admin" class="col-sm-3 control-label"> Email</label>
                <div class="col-sm-6 admin_email">
                    <input type="text" name="Email_Admin" id="Email_Admin" class="form-control col-sm-10" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div id="hide" class="hidden">
            <div class="form-group ">
                <label for="password" class="col-sm-3 control-label label_pas"> Password</label>
                <div class="col-sm-6 current_pas">
                    <input type="password" name="password" id="password" class="form-control" placeholder="********" disabled>
                </div>
            </div>
	            <div class="form-group ">
	                <label for="password" class="col-sm-3 control-label label_pas"> Password</label>
	                <div class="col-sm-6 current_pas">
	                    <input type="password" name="password" id="password" class="form-control" placeholder="********" disabled>
	                </div>
	            </div>           
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-primary" id="update" value="Change"> Change</button>

                </div>
            </div>
        </div>
    </form>
</div >

@stop

@section('script_')
    <script>
    	$(document).ready(function(){
    		$('#update').click(function(){
    			if($('#hide').attr('class') ==  'hidden'){
    				$('#hide').removeClass('hidden');
    				$('#ChangePassword input').attr('disabled', null);
    			}
    		});
    	});
    </script>
@stop