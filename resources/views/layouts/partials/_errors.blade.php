{{-- @if ($errors->any())--}}


{{--<div class="alert alert-danger">--}}

{{--    @foreach ($errors->all() as $error)--}}
{{--    <p>{{$error}}</p>--}}
{{--    @endforeach--}}

{{--</div>--}}
{{--@endif--}}
@if ($errors->any())
<div class="alert alert-danger">

        @foreach ($errors->all() as $error)
        <p class="alert-link" >{{$error}}</p>
        @endforeach


</div>
@endif
