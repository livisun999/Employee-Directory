@extends('layouts.admin')
@section('title', ' - Profile')
@section('content')
<div class="profile_ col-sm-12">
    <form action='postChangePassword' method="post" id="ChangePassword" name="ChangePassword" class="form-horizontal col-sm-12 ">
        {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{{  csrf_token() }}">
        <div class="col-sm-4 pr_left" >
            <div class="user-img">
            <img src="public/assets/Admin/images/profil_page/friend8.jpg" class='img-circle col-sm-10'>
            </div>
                <p> Change image profile </p>

            <button type="button" name="change_img" id="change_img" class="btn btn-default col-sm-5 img-responsive "> Change Image</button>
        </div>
        <div class="col-sm-7 pr_right col-sm-offset-1">
            <div class="form-group text_profile">
                <p> You can view and change your personal information except your username </p>
            </div>
            <div class="form-group">
                   <h1>{{Auth::user()->name}} </h1>
            </div>

            <div class="form-group">
                <label for="password" class=" col-sm-push-9 col-sm-3 control-label">
                    <button type="button"> Change </button>
                </label>
                <div class="col-sm-9 col-sm-pull-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="********" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="yourname" class="col-sm-push-9 col-sm-3 control-label"> Your Name</label>
                <div class="col-sm-9 col-sm-pull-3">
                    <input type="text" name="yourname" id="yourname" class="form-control" value="{{Auth::user()->yourname}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-9">
                    <button type="submit" class="btn btn-primary" id="update"> Update</button>

                </div>
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
</div >

@stop