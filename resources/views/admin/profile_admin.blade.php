@extends('layouts.admin')
@section('title', ' Profile')
@section('content')
<div class="profile_ col-sm-12">
    <form action='profile_admin' method="post" id="updateProfile" name="updateProfile" class="form-horizontal col-sm-12" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{Auth::user()->id}}">

        <div class="col-sm-4 pr_left" id="edit_profile_img">
            <div class="user-img">
            	@if(Auth::user()->image)
            	<img src="public/uploads/admin_img/{{Auth::user()->image}}" class='img-circle col-sm-10 dataPreview'>
            	@else
                <img src="public/uploads/admin_img/default.png" class='img-circle col-sm-10 dataPreview'>
                @endif
            </div>
                <div class="img_change col-sm-7 col-lg-offset-2">
                    <p> Change image profile </p>
                    <input type="file" name="image" accept="image/x-png, image/gif, image/jpeg" >
                </div>
        </div>
        <div class="col-sm-7 pr_right col-sm-offset-0">

            <div class="form-group col-sm-12">
                   <h1 class="col-sm-5 col-sm-offset-3">{{Auth::user()->name}} </h1>
            </div>
            <div class="form-group">
                <label for="yourname" class="col-sm-3 control-label"> Your name</label>
                <div class="col-sm-6 admin_name">
                    <input type="text" name="username" id="name" class="form-control col-sm-10" value="{{Auth::user()->name}}" disabled>
                    @if($errors->has("username"))
                        @foreach($errors->get("username") as $error)
                            <div class="form-hint form-hint-error">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="Email_Admin" class="col-sm-3 control-label"> Email</label>
                <div class="col-sm-6 admin_email">
                    <input type="email" name="email" id="Email_Admin" class="form-control col-sm-10" value="{{Auth::user()->email}}" disabled>
                    @if($errors->has("email"))
                        @foreach($errors->get("email") as $error)
                            <div class="form-hint form-hint-error">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div id="hide" class="hidden">
            <div class="form-group ">
                <label for="password" class="col-sm-3 control-label label_pas"> Password confrim</label>
                <div class="col-sm-6 current_pas">
                    <input type="password" name="password" id="password" class="form-control" placeholder="********" disabled>
                    @if($errors->has("password"))
                        @foreach($errors->get("password") as $error)
                            <div class="form-hint form-hint-error">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>         
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-primary showBtn" id="update" value="Change"> Change</button>
                </div>
            </div>
        </div>
    </form>
</div >

@stop

@section('script_')
    <script>
    	$(document).ready(function(){
    		imgInputPrev('#edit_profile_img');
    		$('.showBtn').click(function(){
    			if($('#hide').attr('class') ==  'hidden'){
    				$('#hide').removeClass('hidden');
    				$('#updateProfile input').attr('disabled', null);
    				$(this).text('update');
    				$(this).addClass('updateBtn');
    				$(this).removeClass('showBtn');
    				$(this).click(null);
    				$(this).click(function(){
    					$('#updateProfile').submit();
    				});
    			}
    		});
    	});
    </script>
@stop