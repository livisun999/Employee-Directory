@extends('layouts.admin')
@section('title',' - List Department')

@section('content')
    <div class="container">
        <div class="row">
            <div class="list_admin">
                <h1> List Department</h1>
                <table class="table table-hover List_admin table-bordered">
                    <tr class="title_listAD">
                        <td># </td>
                        <td> Department Name </td>
                        <td> Manager </td>
                        <td> Office Number </td>
                        <td> Room Number </td>
                        <td> Action </td>
                    </tr>
                    {{--*/ $i = 1 /*--}}
                    @foreach($allDepart as $depar)
                        <tr id="depart_{{$depar['id']}}">
                            <td class="stt">{{$i}} </td>
                            <td class="click_modal">
                                <a href="#" data-toggle="modal" data-target="#myModal"  class="show_modal"
                                   data-id = "{{$depar['id']}}"
                                   data-backdrop="static"
                                   >
                                    {{$depar['Dep_name']}}

                                </a>
                            </td>
                            <td class='dep_master'>{{$depar['Dep_master']}} </td>
                            <td class='dep_phone'>0{{$depar['Dep_Phone']}} </td>
                            <td class="number_room">{{$depar['Dep_number']}} </td>
                            <td class="Action">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="edit_depaerment"
                                   data-id = "{{$depar['id']}}"
                                   data-backdrop="static"
                                    >
                                    <span class="glyphicon glyphicon-pencil edit_depaerment" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                                </a>
                                <a href="#" class="delete_depaerment" ><span class="glyphicon glyphicon-trash  {{$depar['id']}}" data-toggle="tooltip" data-placement="top" title="Delete"></span></a>
                            </td>
                        </tr>
                        {{--*/ $i++ /*--}}

                    @endforeach
                </table>
            </div>

            <!-- MODAL SHOW DEPARTMENT DETAIL -->
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h1 class="modal-title name"></h1>
                            </div>

                            <div class="modal-body">
                                <table class="col-sm-12 table-modal">
                                    <tr>
                                        <td> Room Number:
                                            <span class="room_number"> </span>
                                        </td>
                                        <td> Phone:
                                            <span class="phone"></span>
                                        </td>

                                        <td> Manager:
                                            <span class="master"> </span>
                                        </td>
                                    </tr>
                                </table>
                                <div class="view_employee ">
                                    <p><strong> Employee:</strong>
                                        <span class="employee_"><ul style="margin-left: 60px; list-style: decimal;"></ul></span>
                                    </p>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary close_modal" data-dismiss="modal">Close</button>
                            </div>
                        </div>

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
        </div>
    </div>
@stop
@section('script_')
    @parent
    <script type="text/javascript">
        function createModal(data){
            $('.room_number').html(" <b>&nbsp; " + data.dep.Dep_number + "</b>");
            $('.name').html(" <b>&nbsp; " + data.dep.Dep_name + "</b>");
            $('.master').html(" <b>&nbsp; " + data.dep.Dep_master + "</b>");
            $('.phone').html(" <b>&nbsp;  " +"0" + data.dep.Dep_Phone + "</b>");
            if(!$('.employee_>ul').length){
                $('.employee_').append('<ul style="margin-left: 60px; list-style: decimal;"></ul>');
            }
            var employeeList = $('.employee_>ul');
            employeeList.empty();
            var employees = data.employees;
            for(var i = 0; i < employees.length; i++){
                var li = $('<li></li>');
                li.text(employees[i].name);
                li.id = employees[i].id;
                var detail =  $('<a title="profile" class="em-act-sm pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>');
                detail.attr('data-id',employees[i].id);
                detail.on('click', function(){
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
                li.append(detail);
                employeeList.append(li);
            }
            $('.view_employee').removeClass('border_employee_');
            $('#myModal .close_modal').html('Close');
            $('#myModal .modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal"> Close</button>');
        }

        function createEmployeeModal(data){
            $('#emModal .modal-body').text(JSON.stringify(data));
        }
        function createEditModal(data){
            var token = '{!! csrf_token() !!}';   
            if(data == null) return;
            var dpid = data.dep.id;
            var removeList  = [];
            $('.name').html(" <input required type='text' class='trans' value='" + data.dep.Dep_name + "' > ");

            $('.room_number').html(" <input type='text' value='" + data.dep.Dep_number + "' > ");
            $('.master').html('');

            $('.phone').html(" <input type='text' value='0" + data.dep.Dep_Phone + "' > ");

            if(!$('.employee_>ul').length){
                $('.employee_').append('<ul style="margin-left: 60px; width: 250px; list-style: decimal;"></ul>');
            }
            $('.master').empty();
            if(!$('.master>select').length){
                $('.master').append('<select></select>');
            }
            var employeeList = $('.employee_>ul');
            employeeList.empty();
            var employeeOptions = $('.master>select');
            employeeOptions.empty(); 
            var employees = data.employees;

            for(var i = 0; i < employees.length; i++){
                var li = $('<li></li>');
                li.text(employees[i].name);
                var removeEmpl = $('<a title="remove from department" class="em-act-sm pull-right" href="javascript:void(0)" role="remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>');
                removeEmpl.attr('data-id',employees[i].id);
                var detail =  $('<a title="profile" class="em-act-sm pull-right" href="javascript:void(0);"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>');
                detail.attr('data-id',employees[i].id);
                detail.on('click', function(){
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
                li.append(removeEmpl);
                li.append(detail);
                employeeList.append(li);
                removeEmpl.on('click', function(){
                    var ico = $(this).find('span');
                    var id = $(this).attr('data-id');
                    if($(this).attr('role') == 'remove'){
                        removeList.push(id);
                        ico.css('color', 'orange');
                        ico.attr('class', 'glyphicon glyphicon-repeat');
                        $(this).attr('title', 'undo');
                        $(this).attr('role', 'undo');
                    } else {
                        removeList.splice(removeList.indexOf(id), 1);
                        ico.css('color', '');
                        ico.attr('class', 'glyphicon glyphicon-remove');
                        $(this).attr('title', 'remove from department');
                        $(this).attr('role', 'remove');
                    }
                });

                var option = $('<option></option>');
                option.text(employees[i].name);
                option.val(employees[i].name);
                if(employees[i].name == data.dep.Dep_master){
                    option.attr('selected', 'selected');
                }
                employeeOptions.append(option);
            }
            function renderDepartmentRow(dep){
                var id = dep.id;
                var row = '#depart_'+id;
                if(!(row).length) return;
                var a = $(row+'>.show_modal').text(dep.Dep_name);
                $(row+'>.dep_master').text(dep.Dep_master);
                $(row+'>.dep_phone').text(dep.Dep_Phone);
                $(row+'>.room_number').text(dep.Dep_number);
            }
            $('.view_employee').addClass('border_employee_');
            $('#myModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>' +
                    '<button type="button" class="btn btn-primary close_modal update_department" data-dismiss="modal">Update</button>');
            $('.update_department').bind('click', function(){
                $.ajax({
                    url: 'postEditDepartment',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'depId': dpid,
                        'depMaster': $('.master>select').val(), 
                        'DepartmentName':  $('.name>input').val(),
                        'RoomNumber': $('.room_number>input').val(),
                        'DepartmentPhone': $('.phone>input').val(),
                        'removeList': removeList,
                        '_token': token
                    },
                    complete: function(){

                    },
                    success: function(data){

                        var message =  data.message;
                        if(typeof message === 'undefined'){
                            message = "department was updated";
                        }
                        
                       createNoty('success', message, 5000);
                       renderDepartmentRow(data.dep);
                    },
                    error: function(){
                        var message =  data.message;
                        if(typeof message === 'undefined'){
                            message = "department can not updated";
                        }
                        createNoty('error', message, 5000);   
                    }
                });
            });
        }

        $(document).ready(function() {
            $('a.show_modal').click(function() {
                var depId = $(this).attr('data-id');
                //createModal(data);
                $.ajax({
                    url: 'getDepartmentDetails/'+depId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        createModal(data);
                    }
                });

            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })

            $('a.edit_depaerment').click(function(e){
                var depId = $(this).attr('data-id');
                //createModal(data);
                $.ajax({
                    url: 'getDepartmentDetails/'+depId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        createEditModal(data);
                    }
                });
            });

//            $('.delete_depaerment').click(function(){
//                var cc = $('.edit_depaerment').attr('data-id');
//                alert(cc);
//            });

        });
        $(document).on('show.bs.modal', '.modal', function () {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
    </script>
@stop
