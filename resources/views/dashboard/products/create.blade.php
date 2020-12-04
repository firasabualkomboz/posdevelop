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
            <li class="bring_right"><a href="{{route('dashboard.products.index')}}">@lang('site.products')</a></li>
                <li class="bring_right"><a href="">@lang('site.add')</a></li>
            </ul>

                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">@lang('site.add')</h1>




@include('layouts.partials._errors')

@include('layouts.partials.success')

                    <div class="form" >
                    <form class="form-horizontal" action="{{route('dashboard.products.store')}}" method="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}
{{method_field('post')}}

                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option  value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>




                    @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale . '.name') }}">
                            </div>

                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.description')</label>
                                <textarea  name="{{ $locale }}[description]" class="form-control ckeditor">  {{ old($locale . '.description') }}  </textarea>
                            </div>

                        @endforeach

                        <div class="form-group">
                            <label for="input2" class="col-sm-2 control-label bring_right left_text"> @lang('site.image')</label>
                            <div class="col-sm-10">
                                <input  name="image" type="file" class="form-control image" >
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-10">
                                <img style="width: 100px "; class="img-thumbnail image-preview " src="{{asset('uploads/product_images/defult.png')}}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.purchase_price')</label>
                            <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{ old('purchase_price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ old('sale_price') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.stock')</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                        </div>





                        <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-danger">@lang('site.add') </button>

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
