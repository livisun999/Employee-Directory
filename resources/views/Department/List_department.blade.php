@extends('layouts.admin')
@section('title',' List Department')

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
                            <td class='dep_master'>
                                @if($depar->master)
                                <a href="javascript:void(0);" class="getEmInfo" data-id="{{$depar->master->id}}">{{$depar->master->name}}</a>
                                @else
                                <a href="javascript:void(0);" class="getEmInfo" data-id=""></a>
                                @endif
                            </td>
                            <td class='dep_phone'>0{{$depar['Dep_Phone']}} </td>
                            <td class="number_room">{{$depar['Dep_number']}} </td>
                            <td class="Action">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="edit_depaerment"
                                   data-id = "{{$depar['id']}}"
                                   data-backdrop="static"
                                    >
                                    <span class="glyphicon glyphicon-pencil edit_depaerment" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                                </a>
                                <a data-id="{{$depar['id']}}" class="delete_depaerment" data-toggle="modal" href="#deletemodal"><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
                            </td>
                        </tr>
                        {{--*/ $i++ /*--}}

                    @endforeach
                </table>
            </div>
            <!-- MODAL SHOW DEPARTMENT DETAIL -->
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="deletemodal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h1 class="modal-title name">delete confrim</h1>
                            </div>

                            <div class="modal-body">
                                are you sure tho delete this department?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary close_modal" data-dismiss="modal">yes</button>
                                <button type="button" class="btn btn-default close_modal" data-dismiss="modal">no</button>
                            </div>
                        </div>

                    </div>
                </div>
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
                                <div class="genaral-info">
                                    <div class="user-image profile-img">
                                        <img src="http://localhost/Employee-Directory/public/assets/Admin/images/profil_page/friend8.jpg" class="img-responsive img-circle" />
                                    </div>
                                    <div class="info">
                                        <div class="em-name data" data="name">Lục Văn Minh</div>
                                        <div class="data" data="job_title">giám đốc công nghệ</div>
                                        <div class="depart data" data="department.Dep_name"></div>
                                    </div>
                                </div>
                                <div class="detail-info">
                                    <div class="colum2">
                                        <div class="info-title">contact info</div>
                                        <table>
                                           <tr>
                                               <td>E-mail</td>
                                               <td class="data" data="email">luk.mink@gmail.com</td>
                                           </tr>
                                           <tr>
                                               <td>phone</td>
                                               <td class="data" data="phone">0969407641</td>
                                           </tr>
                                           <tr>
                                               <td>mobile</td>
                                               <td class="data" data="mobile">0969407641</td>
                                           </tr>
                                           <tr>
                                               <td>office</td>
                                               <td class="data" data="office">0969407641</td>
                                           </tr>
                                           <tr>
                                               <td>adress</td>
                                               <td class="data" data="adress">ktx my dinh</td>
                                           </tr>
                                        </table>
                                    </div>
                                    <div class="colum2">
                                        <div class="info-title">other info</div>
                                        <table>
                                           <tr>
                                               <td>sex</td>
                                               <td class="data" data="sex">nam</td>
                                           </tr> 
                                           <tr>
                                               <td>birthday</td>
                                               <td class="data" data="birthday">01/01/1995</td>
                                           </tr>
                                           <tr>
                                               <td>type</td>
                                               <td class="data" data="type">full time</td>
                                           </tr>
                                           <tr>
                                               <td>wage rates</td>
                                               <td><span class="data wage" data="wage">200000</span><span class="data" data="wage_cur">vnd</span></td>
                                           </tr>
                                           <tr>
                                               <td>work from</td>
                                               <td class="data" data="work-from">02/01/1995</td>
                                           </tr>
                                        </table>
                                    </div>
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
                success: function(response){

                    var message =  response.message;
                    if(!message){
                        message = "department was updated";
                    }
                    
                   createNoty('success', message, 5000);
                   renderDepartmentRow(response.data);
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
        $(document).ready(function() {
            $('a.getEmInfo, button.getEmInfo').click(function(){
                        getProfile.call(this, createEmployeeModal);
            });
            $('a.show_modal').click(function() {
                var depId = $(this).attr('data-id');
                //createModal(data);
                $.ajax({
                    url: 'getDepartmentDetails/'+depId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        createModal(response.data);
                    }
                });

            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            $('a.getEmInfo, button.getEmInfo').click(getProfile);
            $('a.edit_depaerment').click(function(e){
                var depId = $(this).attr('data-id');
                //createModal(data);
                $.ajax({
                    url: 'getDepartmentDetails/'+depId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        createEditModal(response.data);
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
