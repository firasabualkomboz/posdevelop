{{-- @if(Session::has('success'))
    <div class="alert alert-danger">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif --}}



  @if (Session::has('success'))

<div class="alert alert-danger">

<p>{{Session::get('success')}}</p>

</div>
@endif



 {{-- @if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif
 --}}
