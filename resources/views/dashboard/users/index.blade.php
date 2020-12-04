@extends('layouts/dashboard.app')

@section('content')



    <!--Start Main content container-->
    <div class="main_content_container">
        <div class="main_container  main_menu_open">
            <!--Start system bath-->
            <div class="home_pass hidden-xs">
                <ul>
                    <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                    <li class="bring_right"><a href=""> @lang('site.dashboard')</a></li>
                    <li class="bring_right"><a href="">@lang('site.users')</a></li>
                </ul>
            </div>
            <!--/End system bath-->



            <div class="page_content">
            <h1 class="heading_title">@lang('site.users') <small>{{$users->total()}}</small></h1>

                @include('layouts.partials.success')



                <div class="wrap">





                    <nav class="navbar navbar-light bg-light">

                        <form method="GET" action="{{route('dashboard.users.index')}}" class="form-inline">
                            <input class="form-control mr-sm-2" name="search" type="search" value="{{request()->search}}" placeholder="@lang('site.search')" aria-label="Search">

                            <button type="submit" class="btn btn-default glyphicon glyphicon-search "></button>


    @if (auth()->user()->hasPermission('create_users'))
    <a  class="btn btn-danger btn-outline-dark" href="{{route('dashboard.users.create')}}">@lang('site.add')
        <span class="glyphicon glyphicon-user
        "></span>
    </a>



    @else
    <a  class="btn btn-outline-dark disabled" href="#">@lang('site.add')
        <span class="glyphicon glyphicon-user
        "></span>
    </a>

    @endif


                          </form>





                      </nav>

               @if ($users->count()>0)
               <table class="table table-bordered">
                <tr>
                    <td>#</td>
                    <td>@lang('site.first_name')</td>
                    <td>@lang('site.last_name')</td>
                    <td>@lang('site.email')</td>
                    <td>@lang('site.image')</td>
                    <td>@lang('site.action')</td>
                </tr>
                @foreach ($users as $index=>$user)
                <tr>


                <td>{{$index +1}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                    <td><img src="{{$user->image_path}}" style="width: 100px" class="img-thumbnail" alt=""></td>
                    <td>

                        @if (auth()->user()->hasPermission('update_users'))


                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> @lang('site.edit')</a>

                            @else
                            <a href="" class="glyphicon glyphicon-pencil disabled" data-toggle="tooltip"
                                data-placement="top" title="@lang('site.edit')"></a>


                        @endif

@if (auth()->user()->hasPermission('delete_users'))


    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" style="display: inline-block">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit"  class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-remove"></i> @lang('site.delete')</button>
    </form><!-- end of form -->



    @else
    <button class="btn btn-danger disabled">@lang('site.delete')</button>
@endif




                           {{--
                           <a href="{{route('dashboard.users.create')}}" class="glyphicon glyphicon-plus  " data-toggle="tooltip"
                           data-placement="top" title="@lang('site.add')"></a> --}}
                    </td>
                </tr>

                    @endforeach



            </table>

{{--
            {{ $users->appends(request()->query())->links() }} --}}
{{$users->appends(request()->query())->links()}}

            @else
            <h2>@lang('site.no_data_found')</h2>

               @endif

                    {{-- <nav class="text-center">
                        <ul class="pagination">
                            <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true">»</span></a>
                            </li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a aria-label="Next" href="#"><span aria-hidden="true">«</span></a></li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
    <!--/End Main content container-->



@endsection
