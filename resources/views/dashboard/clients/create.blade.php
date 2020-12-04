@extends('layouts/dashboard.app')

@section('content')



                    @include('layouts.partials.success')


  <div id="page-wrapper">



      <div class="row">

          <div class="col-lg-12">

              <h4>
                  <a class="active" href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.dashboard')</a>
                  <span><i class="fa fa-angle-left"></i></span>
                  <a class="active" href="{{route('dashboard.clients.index')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.clients')</a>
                  <span><i class="fa fa-angle-left"></i></span>
                  <a class="active" href="{{route('dashboard.clients.create')}}"><i class="fa fa-dashboard fa-fw"></i> @lang('site.add')</a>
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
                              <form action="{{route('dashboard.clients.store')}}" method="POST" role="form">
                                  {{ csrf_field() }}
                                  {{method_field('post')}}
                                  <div class="form-group">
                                      <label>@lang('site.name')</label>
                                      <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                  </div>

                                  @for($i=0; $i<2; $i++)

                                      <div class="form-group">
                                          <label>@lang('site.phone')</label>
                                          <input type="text" name="phone[]" class="form-control">
                                      </div>

                                  @endfor



                                  <div class="form-group">
                                      <label>@lang('site.address')</label>
                                      <textarea  name="address"  class="form-control" rows="3">{{old('address')}}</textarea>
                                  </div>


                                  <button type="submit" class="btn btn-default">@lang('site.add') </button>

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
