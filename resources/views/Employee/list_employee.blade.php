@extends('layouts.admin')
@section('title',' List Employee')
@section('content')

    <div class="container">
        <div class="row">
            <div class="list_admin">
                <h1> List Employee</h1>
                <table class="sortable table table-hover List_admin table-bordered ">
                    <tr>
                        <th> # </th>
                        <th> Name</th>
                        <th>Department</th>
                        <th>Job Title</th>
                        <th> Action</th>
                    </tr>
                    {{--*/  $dem = 1 /*--}}
                    @foreach($list_employee as $list_employ)
                        <tr id="emrow{{$list_employ->id}}">
                            <td>{{$dem}}</td>
                            <td><a href="javascript:void(0)" data="name" class="data getEmInfo" data-id="{{$list_employ->id}}"> {{$list_employ->name}}</a></td>
                            <td data="department.Dep_name" class="data">{{  isset($list_employ->department->Dep_name) ? $list_employ->department->Dep_name : ''}}</td>
                            <td data="job_title" class="data">{{$list_employ->job_title}}</td>
                            <td class="Action">
                                <a href="javascript:void(0)" class="showEditProfile" data-id="{{$list_employ['id']}}"><span class="glyphicon glyphicon-pencil edit_depaerment"> </span> </a>
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
        <div class="modal fade" id="edit_emModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title"> Edit Employee profile</h1>
                    </div>

                    <div class="modal-body">
                        <form id="em-update" files="true" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="genaral-info">
                                <div id="edit_profile_img" class="user-image profile-img">
                                    <img src="public/uploads/profile_img/default.png" class="img-responsive img-circle dataPreview"/>
                                    <div class="Em_img form-group">
                                        <input type="file" name="image" id="Em_img" class="choose_em_img col-sm-12">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="em-name form-group">
                                        <label for="Em_name" class="col-sm-4"> Name: </label>
                                        <input type="text" required="required" title="enter name here" class="Em_name col-sm-8 form-input data" id="Em_name" name="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Em_job_title" class="col-sm-4"> Job Title: </label>
                                        <input type="text" title="enter job title here" heare=" "  class="Em_job_title col-sm-8 form-input data" name="job_title" id="Em_job_title" value="">
                                    </div>
                                    <div class="depart form-group">
                                        <label for="Em_depart" class="col-sm-4 "> Department: </label>
                                        <select id="Em_depart" name="depar_id" class="selectpicker col-sm-8">
                                            @foreach($list_department as $department)
                                                <option value="{{$department->id}}">
                                                    {{$department->Dep_name}}
                                                </option>
                                            @endforeach;
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
                                            <td><input title="enter email here" name="email" required="required" type="email" class="data Em_email" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>phone</td>
                                            <td><input title="enter phone number here" type="text" name="phone" class="data Em_phone" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>mobile</td>
                                            <td><input type="text" title="enter mobile number here" required="required" name="mobile" class="data Em_mobile"></td>
                                        </tr>
                                        <tr>
                                            <td>office</td>
                                            <td><input type="text" title="enter office number here" name="office" class="data Em_office" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>adress</td>
                                            <td><input type="text" title="enter adress here" name="adress" class="data Em_adress" value=""></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="colum2">
                                    <div class="info-title">other info</div>
                                    <table>
                                        <tr>
                                            <td>sex</td>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" value="nam" name="sex"> Nam
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" value="nữ" name="sex"> Nữ
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" value="khác" name="sex"> Khác
                                                </label>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>birthday</td>
                                            <td><input type="date" name="birthday" class="data Em_birthday" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>type</td>
                                            <td><input type="text" name="type" class="data Em_type" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>wage rates</td>
                                            <td><input type="number" name="wage" class="data Em_wage_rates" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>work from</td>
                                            <td><input type="date" name="work_from" class="data Em_work_from" value=""></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary close_modal" id="update-profile">Update</button>
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
                                <h1 class="modal-title"> Employee profile</h1>
                            </div>

                            <div class="modal-body">
                                <div class="genaral-info">
                                    <div class="user-image profile-img">
                                        <img src="public/uploads/profile_img/default.png" class="img-responsive img-circle" />
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

                $(document).ready(function(){
                    imgInputPrev('#edit_profile_img');
                    $('a.getEmInfo, button.getEmInfo').click(function(){
                        getProfile.call(this, createEmployeeModal);
                    });
                    $('a.showEditProfile').click(function(){
                        getProfile.call(this, createEditEmployeeModal);
                    });
                    $('button#update-profile').click(function(){
                        $('#em-update').submit();    
                    })
                    $('#em-update').on('submit', updateProfile);
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