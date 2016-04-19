@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="list_admin">
                <h1> List Employee</h1>
                <table class="table table-hover List_admin table-bordered ">
                    <tr>
                        <th> # </th>
                        <th> Name</th>
                        <th>Department</th>
                        <th>Job Title</th>
                        <th> Action</th>
                    </tr>
                    {{--*/  $dem = 1 /*--}}
                    @foreach($list_employee as $list_employ)
                        <tr>
                            <td>{{$dem}}</td>
                            <td> {{$list_employ['name']}}</td>
                            <td> abc</td>
                            <td>cde</td>
                            <td class="Action">
                                <a href="#"><span class="glyphicon glyphicon-pencil edit_depaerment"> </span> </a>
                                <a href="#" class="delete_depaerment" ><span class="glyphicon glyphicon-trash "></span></a>
                            </td>
                        </tr>
                        {{--*/ $dem++ /*--}}
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@stop