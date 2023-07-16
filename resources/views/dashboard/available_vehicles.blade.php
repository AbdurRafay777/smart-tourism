@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div> <!-- /.container-fluid -->
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Main content -->
    <form action="{{ route('vehicle_details') }}" method="POST">
        @method('POST')
        @csrf
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Available Vehicles</h3>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <label class="form-label"> Starting Date </label>
                            <input class="form-control" type="text" name="start_date" id="start_date" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Ending Date </label>
                            <input class="form-control" type="text" name="end_date" id="end_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">
                            <div class="rental_menu">
                                <select name="rental_id" disabled class="rentals form-control form-select-lg"></select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="vehicle_menu invisible"></div>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Get Vehicle</button>
                        </div>
                    </div>
                </div>
        </section>
    </form>
@endsection
