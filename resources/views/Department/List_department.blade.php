@extends('layouts.admin')
@section('title',' - List Department')

@section('content')
    <div class="list_admin">
        <h1> List Department</h1>
        <table class="table table-hover List_admin table-bordered">
            <tr class="title_listAD">
                <td>Number </td>
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
                                @foreach($list_employee as $employ)
                                    @if($employ['depar_id'] == $depar['id'])
                                   <br>
                                        {{$t}}
                                   )
                                        {{$employ['name'] }}

                                    {{--*/ $t++ /*--}}
                                   &nbsp

                                    @endif

                                @endforeach
                                   </div>

                            "
                           >
                            {{$depar['Dep_name']}}

                        </a>
                    </td>
                    <td>{{$depar['Dep_master']}} </td>
                    <td>0{{$depar['Dep_Phone']}} </td>
                    <td>{{$depar['Dep_number']}} </td>
                    <td class="Action">
                        <a href="#" data-toggle="modal" data-target="#myModal" class="edit_depaerment"
                           data-master="{{$depar['Dep_master']}}"
                           data-phone="{{$depar['Dep_Phone']}}"
                           data-number="{{$depar['Dep_number']}}"
                           data-name = "{{$depar['Dep_name']}}"
                           data-id = "{{$depar['id']}}"

                           data-employee = "
                                <div class=employee_name>
                                {{--*/ $e = 1 /*--}}
                           @foreach($list_employee as $employ)
                               @if($employ['depar_id'] == $depar['id'])
                                  <br>
                                  {{$e}}
                                  )
                                  {{$employ['name'] }}
                                  {{--*/ $e++ /*--}}
                                  &nbsp
                               @endif
                           @endforeach
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
                            ">
                            <span class="glyphicon glyphicon-pencil edit_depaerment" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                        </a>
                        <a href="#" ><span class="glyphicon glyphicon-trash delete_depaerment" data-toggle="tooltip" data-placement="top" title="Delete"></span></a>
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
                $('.close_modal').html('Update');

            });
        });
    </script>
@stop
