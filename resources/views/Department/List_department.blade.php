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
                        <tr>
                            <td class="stt">{{$i}} </td>
                            <td class="click_modal">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="show_modal"
                                   data-master="{{$depar['Dep_master']}}"
                                   data-phone="{{$depar['Dep_Phone']}}"
                                   data-number="{{$depar['Dep_number']}}"
                                   data-name = "{{$depar['Dep_name']}}"
                                   data-id = "{{$depar['id']}}"

                                   data-employee = "
                                        <div class=employee_name>
                                        {{--*/ $t = 1 /*--}}
                                           <table class='col-sm-8'>
                                                @foreach($list_employee as $employ)
                                                    @if($employ['depar_id'] == $depar['id'])
                                                        <tr>
                                                            <td class='col-sm-1'> {{$t}}) </td>
                                                            <td class='col-sm-8'> {{$employ['name'] }} </td>
                                                        </tr>
                                                    {{--*/ $t++ /*--}}
                                                    @endif
                                                @endforeach
                                            </table>
                                           </div>

                                    "
                                   data-backdrop="static"
                                   >
                                    {{$depar['Dep_name']}}

                                </a>
                            </td>
                            <td>{{$depar['Dep_master']}} </td>
                            <td>0{{$depar['Dep_Phone']}} </td>
                            <td class="number_room">{{$depar['Dep_number']}} </td>
                            <td class="Action">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="edit_depaerment"
                                   data-master="{{$depar['Dep_master']}}"
                                   data-phone="{{$depar['Dep_Phone']}}"
                                   data-number="{{$depar['Dep_number']}}"
                                   data-name = "{{$depar['Dep_name']}}"
                                   data-id = "{{$depar['id']}}"

                                   data-employee = "
                                        <div class='employee_name'>
                                        {{--*/ $e = 1 /*--}}
                                   <table class='col-sm-8'>
                                       @foreach($list_employee as $employ)
                                           @if($employ['depar_id'] == $depar['id'])
                                              <tr>
                                                <td class='col-sm-1'> {{$e}}) </td>
                                                <td class='col-sm-8'> {{$employ['name'] }} </td>
                                                <td class='col-sm-3'> <a href='#' ><span class='glyphicon glyphicon-trash ' data-toggle='tooltip' data-placement='top' title='Delete'></span></a> </td>

                                              {{--*/ $e++ /*--}}
                                           @endif
                                       @endforeach
                                    </table>
                                        </div>
                                    "
                                   data-opiton_employee = "
                                        <select >
                                            @foreach($list_employee as $employ)
                                               @if($employ['depar_id'] == $depar['id'])
                                                       <option>
                                                       {{$employ['name'] }}
                                                       <//option>
                                                   @endif

                                            @endforeach
                                        </select>
                                    "
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
                                        <span class="employee_"> </span>
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
        </div>
    </div>
@stop
@section('script_')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {

            $('.show_modal').click(function() {
                var name = $(this).attr('data-name');
                var master = $(this).attr('data-master');
                var phone = $(this).attr('data-phone');
                var number = $(this).attr('data-number');
                var id = $(this).attr('data-id');
                var employee = $(this).attr('data-employee');

                $('.employee_').html( employee);
                $('.room_number').html(" <b>&nbsp; " + number + "</b>");
                $('.name').html(" <b>&nbsp; " + name + "</b>");
                $('.master').html(" <b>&nbsp; " + master + "</b>");
                $('.phone').html(" <b>&nbsp;  " +"0" + phone + "</b>");

                $('.view_employee').removeClass('border_employee_');
                $('.close_modal').html('Close');
                $('.modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal"> Close</button>');
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })

            $('.edit_depaerment').click(function(){
                var name = $(this).attr('data-name');
                var master = $(this).attr('data-master');
                var phone = $(this).attr('data-phone');
                var number = $(this).attr('data-number');
                var id = $(this).attr('data-id');
                var employee = $(this).attr('data-employee');
                var option_employee =  $(this).attr('data-opiton_employee');
//
//                alert(option_employee);

                $('.name').html(" <b>&nbsp; " + name + "</b>");

                $('.employee_').html( employee);
                $('.room_number').html(" <input type='text' value='" + number + "' > ");
                $('.master').html(option_employee);
                $('.phone').html(" <input type='text' value='0" + phone + "' > ");

                $('.view_employee').addClass('border_employee_');

                $('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>' +
                        '<button type="button" class="btn btn-primary close_modal update_department" data-dismiss="modal">Update</button>');
            });

//            $('.delete_depaerment').click(function(){
//                var cc = $('.edit_depaerment').attr('data-id');
//                alert(cc);
//            });

        });
    </script>
@stop
