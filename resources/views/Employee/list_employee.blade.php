@extends('layouts.admin')
@section('title',' List Employee')
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
                            <td><a href="javascript:void(0)" class="getEmInfo" data-id="{{$list_employ['id']}}"> {{$list_employ['name']}}</a></td>
                            <td>{{$list_employ->department->Dep_name}}</td>
                            <td>{{$list_employ->job_title}}</td>
                            <td class="Action">
                                <a href="#" class="showProfile" data-id="{{$list_employ['id']}}"  data-toggle="modal" data-target="#Edit_emModal"><span class="glyphicon glyphicon-pencil edit_depaerment"> </span> </a>
                                <a href="#" class="delete_depaerment" ><span class="glyphicon glyphicon-trash "></span></a>
                            </td>
                        </tr>
                        {{--*/ $dem++ /*--}}
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- MODAL SHOW EMPLOYEE EDIT -->
    <div class="container">
        <!--Modal employee -->
        <div class="modal fade" id="Edit_emModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title"> Edit Employee</h1>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="genaral-info">
                                <div class="user-image profile-img">
                                    <img src="http://localhost/Employee-Directory/public/assets/Admin/images/profil_page/friend8.jpg" class="img-responsive img-circle" />
                                    <div class="Em_img form-group">
                                        <input type="file" id="Em_img" class="choose_em_img col-sm-12">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="em-name data form-group" data="name">
                                        <label for="Em_name" class="col-sm-4"> Name: </label>
                                        <input type="text" class="Em_name col-sm-8" id="Em_name" value=" Luc Van Minh">
                                    </div>
                                    <div class="data form-group" data="job_title">
                                        <label for="Em_job_title" class="col-sm-4"> Job Title: </label>
                                        <input type="text" class="Em_job_title col-sm-8" id="Em_job_title" value="Giam Doc Cong Nghe">
                                    </div>
                                    <div class="depart data form-group" data="department.Dep_name">
                                        <label for="Em_depart" class="col-sm-4 "> Department: </label>
                                        <select id="Em_depart" class="col-sm-8">
                                            <option> Phong nhan su</option>
                                            <option> Phong Hanh Ching</option>
                                            <option> Phong Giam Doc</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="detail-info">
                                <div class="colum2">
                                    <div class="info-title">contact info</div>
                                    <table>
                                        <tr>
                                            <td>E-mail</td>
                                            <td class="data" data="email"><input type="text" class="Em_email" value="luk.mink@gmail.com"></td>
                                        </tr>
                                        <tr>
                                            <td>phone</td>
                                            <td class="data" data="phone"><input type="text" class="Em_phone" value="0969407641"></td>
                                        </tr>
                                        <tr>
                                            <td>mobile</td>
                                            <td class="data" data="mobile"><input type="text" class="Em_mobile" value="0969407641"></td>
                                        </tr>
                                        <tr>
                                            <td>office</td>
                                            <td class="data" data="office"><input type="text" class="Em_office" value="0969407641"></td>
                                        </tr>
                                        <tr>
                                            <td>adress</td>
                                            <td class="data" data="adress"><input type="text" class="Em_adress" value="Ktx My Dinh"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="colum2">
                                    <div class="info-title">other info</div>
                                    <table>
                                        <tr>
                                            <td>sex</td>
                                            <td class="data" data="sex">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Em_sex"> Nam
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Em_sex"> Nữ
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Em_sex"> Khác
                                                </label>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>birthday</td>
                                            <td class="data" data="birthday"><input type="date" class="Em_birthday" value="01/01/1995"></td>
                                        </tr>
                                        <tr>
                                            <td>type</td>
                                            <td class="data" data="type"><input type="text" class="Em_type" value="full time"></td>
                                        </tr>
                                        <tr>
                                            <td>wage rates</td>
                                            <td><input type="text" class="Em_wage_rates" value="1.000 Usd"></td>
                                        </tr>
                                        <tr>
                                            <td>work from</td>
                                            <td class="data" data="work-from"><input type="date" class="Em_work_from" value="02/01/1995"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary close_modal" data-dismiss="modal">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- END FORM MODAL EDIT--}}
        {{--<!-- MODAL SHOW DEPARTMENT DETAIL -->--}}
            {{--<div class="container">--}}
                {{--<!-- Modal -->--}}
                {{--<div class="modal fade" id="myModal" role="dialog">--}}
                    {{--<div class="modal-dialog">--}}

                        {{--<!-- Modal content-->--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                {{--<h1 class="modal-title name"></h1>--}}
                            {{--</div>--}}

                            {{--<div class="modal-body">--}}
                                {{--<table class="col-sm-12 table-modal">--}}
                                    {{--<tr>--}}
                                        {{--<td> Room Number:--}}
                                            {{--<span class="room_number"> </span>--}}
                                        {{--</td>--}}
                                        {{--<td> Phone:--}}
                                            {{--<span class="phone"></span>--}}
                                        {{--</td>--}}

                                        {{--<td> Manager:--}}
                                            {{--<span class="master"> </span>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                {{--<div class="view_employee ">--}}
                                    {{--<p><strong> Employee:</strong>--}}
                                        {{--<span class="employee_"><ul style="margin-left: 60px; list-style: decimal;"></ul></span>--}}
                                    {{--</p>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-primary close_modal" data-dismiss="modal">Close</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

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
            <script type="text/javascript">
            function getProfile(){
                var id = $(this).attr('data-id');
                $.ajax({
                    url: 'employee/profile/'+id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        createEmployeeModal(response.data);
                        $('#emModal').modal('show');
                    }
                });
            }
        function createEmployeeModal(data){
            $('#emModal .data').each(function(){
                var uri = $(this).attr('data').split('.');
                var text = data;
                for (var i = 0; i < uri.length; i++) {
                    text = text[uri[i]];
                }
                $(this).text(text);
            });
        }
                $(document).ready(function(){
                    $('a.getEmInfo, button.getEmInfo').click(getProfile);
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