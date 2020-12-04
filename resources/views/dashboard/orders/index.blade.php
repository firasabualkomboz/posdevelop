

{{--    --}}

    @extends('layouts/dashboard.app')

@section('content')


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
            <!-- /.col-lg-12 -->
        </div>



    {{--    the end --}}

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('site.categories')
            </div>

        @include('layouts.partials.success')
        @include('layouts.partials._errors')


        <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">

                    <div class="box box-primary">

                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.orders')</h3>

                            <form action="{{ route('dashboard.orders.index') }}" method="get">

                                <div class="row">

                                    <div class="col-md-8">
                                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                    </div>

                                </div><!-- end of row -->

                            </form><!-- end of form -->

                        </div><!-- end of box header -->

                        @if ($orders->count() > 0)

                            <div class="box-body table-responsive">

                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('site.client_name')</th>
                                        <th>@lang('site.price')</th>
                                        {{--                                        <th>@lang('site.status')</th>--}}
                                        <th>@lang('site.created_at')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->client->name }}</td>
                                            <td>{{ number_format($order->total_price, 2) }}</td>
                                            {{--<td>--}}
                                            {{--<button--}}
                                            {{--data-status="@lang('site.' . $order->status)"--}}
                                            {{--data-url="{{ route('dashboard.orders.update_status', $order->id) }}"--}}
                                            {{--data-method="put"--}}
                                            {{--data-available-status='["@lang('site.processing')", "@lang('site.finished') "]'--}}
                                            {{--class="order-status-btn btn {{ $order->status == 'processing' ? 'btn-warning' : 'btn-success disabled' }} btn-sm"--}}
                                            {{-->--}}
                                            {{--@lang('site.' . $order->status)--}}
                                            {{--</button>--}}
                                            {{--</td>--}}
                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm order-products"
                                                        data-url="{{ route('dashboard.orders.products', $order->id) }}"
                                                        data-method="get"
                                                >
                                                    <i class="fa fa-list"></i>
                                                    @lang('site.show')
                                                </button>
                                                @if (auth()->user()->hasPermission('update_orders'))
                                                    <a href="{{ route('dashboard.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> @lang('site.edit')</a>
                                                @else
                                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                @endif

                                                @if (auth()->user()->hasPermission('delete_orders'))
                                                    <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                    </form>

                                                @else
                                                    <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i> @lang('site.delete')</a>
                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </table><!-- end of table -->

                                {{ $orders->appends(request()->query())->links() }}

                            </div>

                        @else

                            <div class="box-body">
                                <h3>@lang('site.no_records')</h3>
                            </div>

                        @endif

                    </div><!-- end of box -->

                </div><!-- end of col -->


            </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


{{----}}
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('site.show_products')
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
{{--get--}}
                    <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                        <div class="loader"></div>
                        <p style="margin-top: 10px">@lang('site.loading')</p>
                    </div>

                    <div id="order-product-list">

                    </div><!-- end of order product list -->

{{--                    git--}}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


    </div>
    <!-- /.col-lg-6 -->


@endsection



{{--    --}}
