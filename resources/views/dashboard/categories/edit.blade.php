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
            <li class="bring_right"><a href="{{route('dashboard.categories.index')}}">@lang('site.categories')</a></li>
                <li class="bring_right"><a href="">@lang('site.edit')</a></li>
            </ul>

                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">@lang('site.edit')</h1>




@include('layouts.partials._errors')

@include('layouts.partials.success')

                    <div class="form" >
                    <form class="form-horizontal" action="{{route('dashboard.categories.update',$category->id)}}" method="POST">
                        {{ csrf_field() }}
{{method_field('put')}}

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $category->translate($locale)->name }}">
                            </div>
                        @endforeach




                        <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-danger">@lang('site.edit') </button>
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
