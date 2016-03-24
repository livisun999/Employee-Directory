@extends('layouts.admin')
@section('content')

    <table class="table table-hover">
        <tr>
            <td>Number </td>
            <td> User Name </td>
            <td> Email </td>
            <td> Created at </td>
        </tr>
        {{--*/ $i = 1 /*--}}
        @foreach($allUsers as $users)
            <tr>
                <td>{{$i}} </td>
                <td>{{$users['name']}} </td>
                <td>{{$users['email']}} </td>
                <td>{{$users['created_at']}} </td>
            </tr>
            {{--*/ $i++ /*--}}
        @endforeach
    </table>
@stop
