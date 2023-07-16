<head>
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
</head>

<div class="row my-3">
    <div class="col-md-6">
        <label> Name </label>
        <p class="card-text">{{ $vehicle->name }}</p>
    </div>
    <div class="col-md-6">
        <label> Price Per Day </label>
        <p> {{ $vehicle->price }}</p>
    </div>
</div>
<div class="row my-3">
    <div class="col-md-6">
        <label class="form-label"> Starting Date </label>
        <input class="form-control start_date" type="text" name="start_date">
        @error('start_date')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label"> Ending Date </label>
        <input class="form-control end_date" type="text" name="end_date">
        @error('end_date')
            <div class="alert alert-danger error">{{ $message }}</div>
        @enderror
    </div>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
