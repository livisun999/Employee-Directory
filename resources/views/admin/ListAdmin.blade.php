@extends('layouts.admin')
@section('title',' - List Admin')
@section('content')


    <div class="contact_form">
        <div id="form-messages1"></div>
        @foreach($errors->all(':message') as $message)
            <div id="form-messages" class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endforeach()

<div class="list_admin">
    <h1> List Admin</h1>
     <table class="table table-hover List_admin table-bordered">
        <tr class="title_listAD">
            <td>Number </td>
            <td> User Name </td>
            <td> Name </td>
            <td> Email </td>
            <td> Created at </td>
        </tr>
        {{--*/ $i = 1 /*--}}
        @foreach($allUsers as $users)
            <tr>
                <td class="stt">{{$i}} </td>
                <td>{{$users['name']}} </td>
                <td>{{$users['yourname']}} </td>
                <td>{{$users['email']}} </td>
                <td>{{$users['created_at']}} </td>
            </tr>
            {{--*/ $i++ /*--}}
        @endforeach
    </table>
</div>
@stop
