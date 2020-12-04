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
                <li class="bring_right"><a href="">@lang('site.edit')</a></li>
            </ul>

                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">@lang('site.edit')</h1>




@include('layouts.partials._errors')

@include('layouts.partials.success')

                    <div class="form" >
                    <form class="form-horizontal" action="{{route('dashboard.users.update',$user->id)}}" method="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}
{{method_field('put')}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">@lang('site.first_name')</label>
                                <div class="col-sm-10">
                                <input value="{{$user->first_name}}" name="first_name" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">@lang('site.last_name')</label>
                                <div class="col-sm-10">
                                <input value="{{$user->last_name}}" name="last_name" type="text" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text"> @lang('site.email')</label>
                                <div class="col-sm-10">
                                    <input value="{{$user->email}}" name="email" type="email" class="form-control" >
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="input2" class="col-sm-2 control-label bring_right left_text"> @lang('site.image')</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control image">
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-10">
                                <img style="width: 100px "; class="img-thumbnail image-preview " src="{{$user->image_path}}" alt="">
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
                                        {{-- create user > ?  --}}
                                        <label >  <input name="permissions[]" {{$user->hasPermission($map.'_'.$model) ?'checked ' : ''}} type="checkbox" value="{{$map.'_'.$model}}"> @lang('site.'.$map) </label>
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
                                    <button type="submit" class="btn btn-danger">@lang('site.edit') </button>
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
