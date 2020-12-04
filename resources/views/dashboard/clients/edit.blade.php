@extends('layouts/dashboard.app')

@section('content')


    <!--Start Main content container-->
    <div class="main_content_container">
        <div class="main_container  main_menu_open">
            <!--Start system bath-->



            <!--/End system bath-->
            <div class="page_content">

                {{--                    <h1 class="heading_title">@lang('site.add')</h1>--}}




                @include('layouts.partials.success')




            </div>
        </div>
    </div>
    <!--/End Main content container-->




    <!--/End system bath-->

    <div id="page-wrapper">



        <div class="row">

            <div class="col-lg-12">

                <h4>
                    <span>@lang('site.dashboard')</span>  <span>=></span>    <span>@lang('site.clients')</span>   <span>=></span> <span>@lang('site.edit')</span>
                </h4>
            </div>

            <div class="col-lg-12">
                <h1 class="page-header">@lang('site.clients')</h1>
            </div>
            <!-- /.col-lg-12 -->

        </div>
    @include('layouts.partials._errors')



    <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{route('dashboard.clients.update',$client->id)}}" method="POST" role="form">
                                    {{ csrf_field() }}
                                    {{method_field('put')}}
                                    <div class="form-group">
                                        <label>@lang('site.name')</label>
                                        <input type="text" name="name" value="{{$client->name}}" class="form-control">
                                    </div>

                                    @for($i=0; $i<2; $i++)

                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" value="{{$client->phone [$i] ?? '' }}" name="phone[]" class="form-control">
                                        </div>

                                    @endfor



                                    <div class="form-group">
                                        <label>@lang('site.address')</label>
                                        <textarea  name="address"  class="form-control" rows="3">{{$client->address}}</textarea>
                                    </div>


                                    <button type="submit" class="btn btn-default">@lang('site.edit') </button>

                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->


                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    </div>



@endsection
