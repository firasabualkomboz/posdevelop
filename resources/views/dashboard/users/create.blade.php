@extends('layouts/dashboard.app')

@section('content')


  <!--Start Main content container-->
  <div class="main_content_container">
    <div class="main_container  main_menu_open">
        <!--Start system bath-->
        <div class="home_pass hidden-xs">
            <ul>
                <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                <li class="bring_right"><a href="{{route('dashboard.welcome')}}"> @lang('site.dashboard')</a></li>
            <li class="bring_right"><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
                <li class="bring_right"><a href="">@lang('site.add')</a></li>
            </ul>

                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">@lang('site.add')</h1>




@include('layouts.partials._errors')

@include('layouts.partials.success')

                    <div class="form" >
                    <form class="form-horizontal" action="{{route('dashboard.users.store')}}" method="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}
{{method_field('post')}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">@lang('site.first_name')</label>
                                <div class="col-sm-10">
                                <input value="{{old('first_name')}}" name="first_name" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">@lang('site.last_name')</label>
                                <div class="col-sm-10">
                                <input value="{{old('last_name')}}" name="last_name" type="text" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text"> @lang('site.email')</label>
                                <div class="col-sm-10">
                                    <input value="{{old('email')}}" name="email" type="email" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text"> @lang('site.image')</label>
                                <div class="col-sm-10">
                                    <input  name="image" type="file" class="form-control image" >
                                </div>
                            </div>

                        <div class="form-group">

                            <div class="col-sm-10">
                                <img style="width: 100px "; class="img-thumbnail image-preview " src="{{asset('uploads/users_images/defult.png')}}" alt="">
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input  name="password" type="password" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">@lang('site.password_conformation') </label>
                                <div class="col-sm-10">
                                    <input  name="password_confirmation" type="password" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-2 control-label bring_right left_text">@lang('site.permissions') </label>
                                <div class="col-sm-10">

                                    <div  class="nav-tabs-custom">

                                        @php
                                            $models = ['users','categories','products','clients','orders'];
                                            $maps =['create','read','update','delete'];
                                        @endphp


                                        <ul  class="nav nav-tabs ">

                 @foreach ($models as $index=> $model)

                                        <li style="float: right" class="{{$index ==0 ? 'active' : ''}}"><a href="#{{$model}}" data-toggle="tab">@lang('site.'.$model)</a></li>

                 @endforeach

                                        </ul>

                                        <div style="padding: 10px"  class="tab-content">

                                      @foreach ($models as $index=> $model)

                                      <div  class="tab-pane {{$index ==0 ?'active' : ''}}" id="{{$model}}">


                                        @foreach ($maps as $map)
                                        <label >  <input name="permissions[]" type="checkbox" value="{{$map.'_'.$model}}"> @lang('site.'.$map) </label>
                                        @endforeach


                                       </div>

                                      @endforeach

                                        </div>
                                        <!-- /.tab-content -->
                                      </div>
                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-danger">@lang('site.add') </button>
                                    <button type="reset" class="btn btn-default">مسح الحقول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/End Main content container-->



{{--  --}}


        <!--/End system bath-->




@endsection
