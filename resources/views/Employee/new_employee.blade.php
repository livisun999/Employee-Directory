@extends('layouts.admin')
@section('title',' New Administrator')
@section('content')

    <div class="container">
        <div class="row form_add_new">
            <form action='postnewemployee' method="post" id="form_add_new_employee" name="form_add_new_employee" role="form" enctype="multipart/form-data" class="form-horizontal col-sm-8">
                {!! csrf_field() !!}
                <input type="hidden" name="_token" value="{!!  csrf_token() !!}">
                <h1> Add New Employee </h1>
                <div class="form-group input_user ">
                    <label for="Em_name" class="col-lg-offset-1 col-sm-2 control-label"> Name </label>
                    <div class="col-sm-7">
                        <input type="text" name="name" class="form-control" name="name" value="{{old('name')}}" placeholder="Employee name">
                        @if($errors->has("name"))
                            @foreach($errors->get("name") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-offset-1 col-sm-2 control-label"> Job title</label>
                    <div class="col-sm-7">
                        <input type="text" name="job_title" class="form-control" placeholder="Job title" value="{{old('job_title')}}">
                        @if($errors->has("job_title"))
                            @foreach($errors->get("job_title") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-offset-1 col-sm-2 control-label"> email</label>
                    <div class="col-sm-7">
                        <input type="text" name="email" class="form-control" placeholder="email@xxx.com" value="{{old('email')}}">
                        @if($errors->has("email"))
                            @foreach($errors->get("email") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-offset-1 col-sm-2 control-label"> mobile</label>
                    <div class="col-sm-7">
                        <input type="text" name="mobile" class="form-control" placeholder="Employee mobile" value="{{old('mobile')}}">
                        @if($errors->has("mobile"))
                            @foreach($errors->get("mobile") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-offset-1 col-sm-2 control-label"> Department</label>
                    <div class="col-sm-7">
                        <select name="depar_id" class="form-control">
                            @foreach($listDepartment as $dep)
                                <option value="{{$dep->id}}" @if(old('depar_id') == $dep->id) selected @endif>{{$dep->Dep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_phone" class="col-lg-offset-1 col-sm-2 control-label"> image</label>
                    <div class="col-sm-7" id="imgInputPrev">
                        <img class="dataPreview prevpic" />
                        <input type="file" name="image" value="{{old('image')}}" accept="image/x-png, image/gif, image/jpeg" >
                        @if($errors->has("image"))
                            @foreach($errors->get("image") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>  
                <div class="form-group">
                    <label for="Em_" class="col-lg-offset-1 col-sm-2 control-label">sex</label>
                    <div class="col-sm-7">
                        <label class="radio-inline" style="margin-bottom: -7px;">
                        <input type="radio" value="nam" name="sex" @if(old('sex') == "nam" || old('sex') == null) checked @endif> Nam
                        </label>
                        <label class="radio-inline" style="margin-bottom: -7px;">
                            <input type="radio" value="nữ" name="sex" @if(old('sex') == "nữ") checked @endif> Nữ
                        </label>
                        <label class="radio-inline" style="margin-bottom: -7px;">
                            <input type="radio" value="khác" name="sex" @if(old('sex') == "khác") checked @endif> Khác
                        </label>
                    </div>
                </div>
                <div id="addtion-input" hidden="hidden">
                <div class="form-group">
                    <label for="Em_" class="col-sm-2 control-label"> Phone number</label>
                    <div class="col-sm-4">
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                        @if($errors->has("phone"))
                            @foreach($errors->get("phone") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <label for="Em_" class="col-sm-2 control-label">Office number</label>
                    <div class="col-sm-4">
                        <input type="text" name="office"  class="form-control" placeholder="office">
                        @if($errors->has("office"))
                            @foreach($errors->get("office") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_" class="col-sm-2 control-label"> adress</label>
                    <div class="col-sm-4">
                        <input type="text" name="adress"  class="form-control" placeholder="adress">
                        @if($errors->has("adress"))
                            @foreach($errors->get("adress") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <label for="Em_" class="col-sm-2 control-label"> birthday</label>
                    <div class="col-sm-4">
                        <input type="date" name="birthday"  class="form-control" placeholder="birthday" value="{{old('birthday')}}">
                        @if($errors->has("birthday"))
                            @foreach($errors->get("birthday") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_" class="col-sm-2 control-label">type</label>
                    <div class="col-sm-4">
                        <select name="type" class="form-control">
                            <option value="full time">full time</option>
                            <option value="part time">part time</option>
                            <option value="fresher">fresher</option>
                            <option value="intership">intership</option>
                            <option value="collaborators">collaborators</option>
                            <option value="other">other</option>
                        </select>
                        <div class="form-info"></div>
                    </div>
                    <label for="Em_" class="col-sm-2 control-label">status</label>
                    <div class="col-sm-4">
                        <select name="status" class="form-control">
                            <option value="nomal" @if(old('status') == "nomal") checked @endif>nomal</option>
                            <option value="leave" @if(old('status') == "leave") checked @endif>leave</option>
                            <option value="misson" @if(old('status') == "misson") checked @endif>misson</option>
                            <option value="other" @if(old('status') == "other") checked @endif>other</option>
                        </select>
                        <div class="form-info"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Em_" class="col-sm-2 control-label"> wage</label>
                    <div class="col-sm-4">
                        <input type="number" name="wage"  class="form-control" placeholder="wage rate" value="{{old('wage')}}">
                        @if($errors->has("wage"))
                            @foreach($errors->get("wage") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <label for="Em_" class="col-sm-2 control-label"> paid by</label>
                    <div class="col-sm-4">
                        <input type="text" name="wage_cur"  class="form-control" placeholder="wage_cur" value="{{null!=old('wage_cur')?old('wage_cur'):'vnđ'}}">
                        @if($errors->has("wage_cur"))
                            @foreach($errors->get("wage_cur") as $error)
                                <div class="form-hint form-hint-error">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                </div>
                <div class="form-group mt10">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div><a href="#addtion-input" class="toggleshow showup">show more infomation</a></div>
                        <div style="padding-left: 20px" class="checkbox">
                        <label>
                            <input type="checkbox" name="addNext" @if(old('addNext')) checked @endif>
                            Add another employee
                        </label>
                        </div>
                        <button type="reset" class="btn btn-default"> Reset </button>
                        <button type="submit" class="btn btn-primary"> Creat </button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@stop
@section('script_')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form_add_new_admin").validate({
                rules: {
                    username: {
                        required: true,
                        rangelength: [2,50]
                    },
                    yourname: {
                        required: true
                    },

                    Email:{
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Please enter the Username",
                        rangelength: "The username is the wrong length"
                    },
                    yourname: {
                        required: "Please enter the Your name"
                    },

                    Email:{
                        required:"Please enter the Email"
                    }

                }
            });
        });
        $(document).ready(function(){
            imgInputPrev('#imgInputPrev');
            $('a.toggleshow').bind('click',function(){
                var target = $(this).attr('href');
                if($(this).attr('class') == 'toggleshow showup'){
                    $(this).attr('class', 'toggleshow hideoff');
                    $(target).show();    
                } else {
                    $(this).attr('class', 'toggleshow showup');
                    $(target).hide();
                }
                
            });
        })
    </script>
@stop