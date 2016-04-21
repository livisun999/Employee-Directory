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
                                <a href="#" class="showProfile" data-id="{{$list_employ['id']}}"><span class="glyphicon glyphicon-pencil edit_depaerment"> </span> </a>
                                <a href="#" class="delete_depaerment" ><span class="glyphicon glyphicon-trash "></span></a>
                            </td>
                        </tr>
                        {{--*/ $dem++ /*--}}
                    @endforeach
                </table>
            </div>
        </div>
    </div>

        <!-- MODAL SHOW EMPLOYEE DETAIL -->
            <div class="container">
                <!--Modal employee -->
                <div class="modal fade" id="emModal" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h1 class="modal-title"> Thông Tin Nhân Viên</h1>
                            </div>

                            <div class="modal-body">
                                thông tin ở đây

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary close_modal" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>            
            </div>

            <script type="text/javascript">
            function createEmployeeModal(data){
                $('#emModal .modal-body').text(JSON.stringify(data));
            }
                $(document).ready(function(){
                    $('.showProfile').bind('click', function(){
                         var id = $(this).attr('data-id');
                        $.ajax({
                            url: 'employee/profile/'+id,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data){
                                createEmployeeModal(data);
                                $('#emModal').modal('show');
                            }
                        });
                    });
                });
            </script>

@stop