

@extends('layouts/dashboard.app')

@section('content')



    <!--Start Main content container-->
    <div class="main_content_container">
        <div class="main_container  main_menu_open">
            <!--Start system bath-->
{{--            <div class="home_pass hidden-xs">--}}
{{--                <ul>--}}
{{--                    <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>--}}
{{--                    <li class="bring_right"><a href=""> @lang('site.dashboard')</a></li>--}}
{{--                    <li class="bring_right"><a href="">@lang('site.products')</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

            <div class="col-lg-12">

                <h4>
                    <a class="active" href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.dashboard')</a>
                    <span><i class="fa fa-angle-left"></i></span>
                <a class="active" href="#"><i class="fa fa-dashboard fa-fw"></i> @lang('site.products')</a>
                </h4>

            </div>

            <!--/End system bath-->



            <div class="page_content">
                <h1 class="heading_title">@lang('site.products') <small>{{$products->total()}}</small></h1>
                @include('layouts.partials.success')

                <div class="wrap">





                    <nav class="navbar navbar-light bg-light">

                        <form method="GET" action="{{route('dashboard.products.index')}}" class="form-inline">
                            <input class="form-control mr-sm-2" name="search" type="search" value="{{request()->search}}" placeholder="@lang('site.search')" aria-label="Search">


                        <select class="form-control" name="category_id" id="">


                            <option value="">@lang('site.all_categories')</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}} {{request()-> category_id == $category -> id ? 'selected' : ''}}  ">{{$category->name}}</option>
                            @endforeach
                        </select>

                            <button type="submit" class="btn  btn-danger btn-outline-dark glyphicon glyphicon-search "></button>

                        @if (auth()->user()->hasPermission('create_products'))

                                <a  class="btn btn-danger btn-outline-dark" href="{{route('dashboard.products.create')}}">@lang('site.add')
                                    <span class="glyphicon glyphicon-category"></span>
                                </a>

                            @else
                                <a  class="btn btn-outline-dark disabled" href="#">@lang('site.add')
                                    <span class="glyphicon glyphicon-category"></span>
                                </a>

                            @endif




                        </form>
                    </nav>

                    @if ($products->count()>0)
                        <table style="text-align: center" class="table table-bordered ">
                            <tr>
                                <td>#</td>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.category')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.purchase_price')</th>
                                <th>@lang('site.sale_price')</th>
                                <th>@lang('site.profit_percent') %</th>
                                <th>@lang('site.stock')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            @foreach ($products as $index=>$product)
                                <tr>


                                    <td>{{$index +1}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>{{ $product->category->name }}</td>

                                    <td><img src="{{$product->image_path}}" style="width: 100px" class="img-thumbnail" alt=""></td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->profit_percent }} %</td>
                                    <td>{{ $product->stock }}</td>
<td>

                                    @if (auth()->user()->hasPermission('update_products'))


                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> @lang('site.edit')</a>

                                    @else
                                        <a href="" class="glyphicon glyphicon-pencil disabled" data-toggle="tooltip"
                                           data-placement="top" title="@lang('site.edit')"></a>


                                    @endif

                                    @if (auth()->user()->hasPermission('delete_products'))


                                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit"  class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-remove"></i> @lang('site.delete')</button>
                                        </form><!-- end of form -->



                                    @else
                                        <button class="btn btn-danger disabled">@lang('site.delete')</button>
                                        @endif




                                        {{--
                                        <a href="{{route('dashboard.products.create')}}" class="glyphicon glyphicon-plus  " data-toggle="tooltip"
                                        data-placement="top" title="@lang('site.add')"></a> --}}
                                        </td>
                                </tr>

                            @endforeach



                        </table>

                        {{--
                                    {{ $products->appends(request()->query())->links() }} --}}
                        {{$products->appends(request()->query())->links()}}

                    @else
                        <h2>@lang('site.no_data_found')</h2>

                    @endif


                </div>
            </div>
        </div>
    </div>
    <!--/End Main content container-->




@endsection

