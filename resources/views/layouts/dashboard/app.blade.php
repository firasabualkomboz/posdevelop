
<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
    <html lang="ar" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin panel</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    @if (app()->getLocale() == 'ar')

    <link href="{{asset('dashboard_files/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard_files/css/icon.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard_files/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard_files/css/ar.css')}}" rel="stylesheet" class="lang_css arabic">


    <link href="{{asset('dashboard_files/css/noty.css')}}" rel="stylesheet">

        <script src="{{asset('dashboard_files/plugins/ckeditor/ckeditor.js')}}"></script>

        <!-- Ionicons -->
{{--        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--        <link href="{{asset('dashboard/css/ltr/adminlte.min.css')}}" rel="stylesheet">--}}
        <!-- Google Font: Source Sans Pro -->
{{--        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
{{--        <link href="{{asset('dashboard/css/ltr/custom.css')}}" rel="stylesheet">--}}

        <link href="{{ asset('dashboard_files/rtldashboard/rtl/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard_files/rtldashboard/rtl/bootstrap.rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard_files/rtldashboard/rtl/sb-admin-2.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('dashboard_files/rtldashboard/plugins/metisMenu/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/rtldashboard/plugins/timeline.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/rtldashboard/plugins/morris.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/rtldashboard/font-awesome/font-awesome.min.css')}}">

    {{--css morris --}}

            <link rel="stylesheet" href="{{asset('dashboard_files/plugins/morris/morris.css')}}">

        <!-- Custom Fonts -->
        <link href="{{asset('dashboard_files/rtldashboard/font-awesome/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

{{--        //include print thos library--}}
       <script src="{{asset('dashboard_files/js/printThis.js')}}"></script>


        @else

@endif

    {{-- links move  --}}

</head>
<body>



{{-- new app dash board --}}

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('dashboard.welcome')}}">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Task 1</strong>
                                <span class="pull-right text-muted">40% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Task 2</strong>
                                <span class="pull-right text-muted">20% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Task 3</strong>
                                <span class="pull-right text-muted">60% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Task 4</strong>
                                <span class="pull-right text-muted">80% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Tasks</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                <i class="fa fa-language fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <li><a rel="alternate" hreflang="{{ $localeCode }} href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><i class="fa fa-user fa-fw"></i>  {{ $properties['native'] }}</a>
                </li>
                @endforeach


            </ul>




            <!-- /.dropdown-user -->
        </li>
        <!-- /.end change languge  -->

    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>

                <li>
                    <a class="active" href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.dashboard')</a>
                </li>



                @if (auth()->user()->hasPermission('read_categories'))
                    <li>
                        <a class="active" href="{{route('dashboard.categories.index')}}"><i class="fa fa-list fa-fw"></i> @lang('site.categories')</a>
                    </li>
                @endif


                @if (auth()->user()->hasPermission('read_products'))
                    <li>
                        <a class="active" href="{{route('dashboard.products.index')}}"><i class="fa fa-list fa-fw"></i> @lang('site.products')</a>
                    </li>
                @endif

                @if (auth()->user()->hasPermission('read_clients'))
                    <li>
                        <a class="active" href="{{route('dashboard.clients.index')}}"><i class="fa fa-users fa-fw"></i> @lang('site.clients')</a>
                    </li>

                @endif

                @if (auth()->user()->hasPermission('read_orders'))
                    <li>
                        <a class="active" href="{{route('dashboard.orders.index')}}"><i class="fa fa-users fa-fw"></i> @lang('site.orders')</a>
                    </li>

                @endif


            @if (auth()->user()->hasPermission('read_users'))
                    <li>
                        <a class="active" href="{{route('dashboard.users.index')}}"><i class="fa fa-users fa-fw"></i> @lang('site.users')</a>
                    </li>

                @endif




            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

{{--end new app dashboard--}}


@yield('content')



{{-- @include('partials._error');--}}
{{-- @include('layouts.partials._errors')--}}
{{--  @include('layouts.partials.success')--}}
   @include('layouts.partials._session')


<!-- jQuery Version 1.11.0 -->

<script src="{{asset('dashboard_files/rtldashboard/js/jquery-1.11.0.js')}}"></script>


<!-- Bootstrap Core JavaScript -->

<script src="{{asset('dashboard_files/rtldashboard/js/bootstrap.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->

<script src="{{asset('dashboard_files/rtldashboard/js/metisMenu/metisMenu.min.js')}}"></script>
<!-- Morris Charts JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('dashboard_files/rtldashboard/js/morris/morris.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('dashboard_files/rtldashboard/js/sb-admin-2.js')}}"></script>




{{--<script type="text/javascript" src="{{asset('dashboard/js/jquery-2.1.4.min.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>--}}


<script src="{{asset('dashboard_files/js/js.js')}}"></script>
<script src="{{asset('dashboard_files/js/noty.js')}}"></script>

{{--include js order --}}
<script src="{{asset('dashboard_files/js/custom/image_preview.js')}}"></script>

<script src="{{asset('dashboard_files/js/custom/order.js')}}"></script>

{{--include file js jquery number --}}
<script src="{{asset('dashboard_files/js/jquery.number.min.js')}}"></script>


{{--include chart--}}
<script src="{{asset('dashboard_files/plugins/morris/morris.min.js')}}"></script>

<script src="{{asset('dashboard_files/plugins/morris/morris.js')}}"></script>


<script>


        //delete

        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),




                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete


        //image jquery




        $(".image").change(function() {

            // let that = $this;
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
//        end image

        CKEDITOR.config.language =  "{{ app()->getLocale() }}";

</script>

@stack('scripts')
</body>
</html>





{{-- the end  --}}
