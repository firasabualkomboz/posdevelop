@extends('layouts/dashboard.app')

@section('content')

    @include('layouts.partials.success')
    @include('layouts.partials._errors')


    {{--    the end --}}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <h4>
                    <a class="active" href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.dashboard')</a>
                    <span>=></span>
                    <a class="active" href="{{route('dashboard.clients.index')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.clients')</a>
                    <span>=></span>
                    <a class="active" href="{{route('dashboard.clients.create')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.add_order')</a>
                </h4>

            </div>

            <div class="col-lg-12">
                <h1 class="page-header">@lang('site.add_order')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('site.categories')
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @foreach ($categories as $category)

                                <div class="panel-group">

                                    <div class="panel panel-info">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                            </h4>
                                        </div>

                                        <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">

                                            <div class="panel-body">

                                                @if ($category->products->count() > 0)

                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>@lang('site.name')</th>
                                                            <th>@lang('site.stock')</th>
                                                            <th>@lang('site.price')</th>
                                                            <th>@lang('site.add')</th>
                                                        </tr>

                                                        @foreach ($category->products as $product)

                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>{{ number_format($product->sale_price, 2) }}</td>
                                                                <td>
                                                                    <a href=""
                                                                       id="product-{{ $product->id }}"
                                                                       data-name="{{ $product->name }}"
                                                                       data-id="{{ $product->id }}"
                                                                       data-price="{{ $product->sale_price }}"
                                                                       class="btn btn-success btn-sm add-product-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </table><!-- end of table -->

                                                @else

                                                    <h5>@lang('site.no_records')</h5>

                                                @endif

                                            </div><!-- end of panel body -->

                                        </div><!-- end of panel collapse -->

                                    </div><!-- end of panel primary -->

                                </div><!-- end of panel group -->

                            @endforeach


                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('site.orders')
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>@lang('site.product')</th>
                                        <th>@lang('site.quantity')</th>
                                        <th>@lang('site.price')</th>
                                    </tr>
                                    </thead>
                                    <tbody class="order-list">

                                    </tbody>
                                </table>
                                <h4>@lang('site.total') : <span class="total-price">0</span></h4>

                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('site.add_order')</button>

                            </form>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->


            </div>
            <!-- /.col-lg-6 -->


            <div class="col-lg-6">
                @if ($client->orders->count() > 0)

                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('site.previous_orders')
                        <small>{{ $orders->total() }}</small>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @foreach ($orders as $order)
                                <div class="panel-group">

                                    <div class="panel panel-success">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>
                                            </h4>
                                        </div>

                                        <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">

                                            <div class="panel-body">

                                                <ul class="list-group">
                                                    @foreach ($order->products as $product)
                                                        <li class="list-group-item">{{ $product->name }}</li>
                                                    @endforeach
                                                </ul>

                                            </div><!-- end of panel body -->

                                        </div><!-- end of panel collapse -->

                                    </div><!-- end of panel primary -->

                                </div><!-- end of panel group -->

                            @endforeach

                            {{ $orders->links() }}

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

                @endif
            </div>






        </div>
        <!-- /.row -->

    </div>


    {{--    the end --}}

@endsection

