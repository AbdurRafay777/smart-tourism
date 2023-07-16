@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vehicle Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                {{-- <div class="row my-3">
                    <div class="col-md-3 offset-md-1">
                        <label> Name </label>
                        <p class="card-text">{{ $vehicle->name }}</p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label> Price </label>
                        <p> {{ $vehicle->price }}</p>
                    </div>
                </div> --}}
                {{-- <div class="row my-3">
                    <div class="col-md-3 offset-md-1">
                        <label> Starting Date</label>
                        <p class="card-text">{{ $trip->start_date }}</p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label> Ending Date </label>
                        <p class="card-text">{{ $trip->end_date }}</p>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-3 offset-md-1">
                        <label> No. of People</label>
                        <br>
                        <select class="people form-select form-select-lg">
                            <option selected disabled value="">Select People</option>
                            @for ($i = 1; $i <= $trip->no_of_seats; $i++)
                                <option value="{{ $trip->price * $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label> Total Price </label>
                        <p id="price" class="card-text"></p>
                    </div> --}}
                    {{-- <div class="col-md-3 offset-md-1">
                        <form action="#" method="POST">
                            @method('POST')
                            @csrf
                            <button type="submit" class="btn btn-success">Book Trip</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
