

@extends('layouts/dashboard.app')

@section('content')



    <!--Start Main content container-->
    <div class="main_content_container">
        <div class="main_container  main_menu_open">



            <div class="page_content">
                <h1 class="heading_title">@lang('site.clients') <small>{{$clients->total()}}</small></h1>
                @include('layouts.partials.success')

                <div class="wrap">





                    <nav class="navbar navbar-light bg-light">

                        <form method="GET" action="{{route('dashboard.clients.index')}}" class="form-inline">
                            <input class="form-control mr-sm-2" name="search" type="search" value="{{request()->search}}" placeholder="@lang('site.search')" aria-label="Search">

                            <button type="submit" class="btn btn-default glyphicon glyphicon-search "></button>


                            @if (auth()->user()->hasPermission('create_clients'))

                                <a  class="btn btn-danger btn-outline-dark" href="{{route('dashboard.clients.create')}}">@lang('site.add')
                                    <span class="glyphicon glyphicon-client"></span>
                                </a>

                            @else
                                <a  class="btn btn-outline-dark disabled" href="#">@lang('site.add')
                                    <span class="glyphicon glyphicon-client"></span>
                                </a>

                            @endif

                        </form>
                    </nav>

                    @if ($clients->count()>0)
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td>@lang('site.name')</td>
                                <td>@lang('site.phone')</td>
                                <td>@lang('site.phone_1')</td>
                                <td>@lang('site.address')</td>
                                <td>@lang('site.action')</td>

                            </tr>
                            @foreach ($clients as $index=>$client)
                                <tr>


                                    <td>{{$index +1}}</td>
                                    <td>{{$client->name}}</td>
{{--                                    <td>{{implode(array_filter($client->phone), '-')  }} </td>--}}
{{--                                    <td>{{ is_array($client->phone) ? implode($client->phone, '-') : $client->phone }}</td>--}}
                                    <td>{{$client->phone[0]}}</td>
                                    <td>{{$client->phone[1]}}</td>
                                    <td>{{$client->address}}</td>

<td>

                                    @if (auth()->user()->hasPermission('update_clients'))


                                        <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> @lang('site.edit')</a>

                                    @else
                                        <a href="" class="glyphicon glyphicon-pencil disabled" data-toggle="tooltip"
                                           data-placement="top" title="@lang('site.edit')"></a>


                                    @endif

                                    @if (auth()->user()->hasPermission('delete_clients'))


                                        <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit"  class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-remove"></i> @lang('site.delete')</button>
                                        </form><!-- end of form -->



                                    @else
                                        <button class="btn btn-danger disabled">@lang('site.delete')</button>
                                        @endif




                                        {{--
                                        <a href="{{route('dashboard.clients.create')}}" class="glyphicon glyphicon-plus  " data-toggle="tooltip"
                                        data-placement="top" title="@lang('site.add')"></a> --}}
                                        </td>
                                </tr>

                            @endforeach



                        </table>

                        {{--
                                    {{ $clients->appends(request()->query())->links() }} --}}
                        {{$clients->appends(request()->query())->links()}}

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

