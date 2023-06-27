@if (Session::has('success'))
<div class="container">
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if (Session::has('error'))
<div class="container">
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
</div>
@endif
