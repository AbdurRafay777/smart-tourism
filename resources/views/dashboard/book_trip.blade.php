@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trip Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-md-3 offset-md-1">
                        <label> Departure </label>
                        <p class="card-text">{{ $trip->departure_city->name }}</p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label> Destination </label>
                        <p> {{ $trip->destination_city->name }}</p>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-3 offset-md-1">
                        <label> Starting Date</label>
                        <p class="card-text">{{ $trip->start_date }}</p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label> Ending Date </label>
                        <p class="card-text">{{ $trip->end_date }}</p>
                    </div>
                </div>
                <form action="{{ route('post_booked_trip', $trip->id) }}" method="POST">
                    <div class="row my-3">
                        <div class="col-md-3 offset-md-1">
                            <label> No. of People</label>
                            <br>
                            <select name="no_of_seats" class="people form-select form-select-lg">
                                <option selected disabled value="">Select People</option>
                                @for ($i = 1; $i <= $trip->no_of_seats; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <label> Total Price </label>
                            <p id="price" class="card-text"></p>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            @method('POST')
                            @csrf
                            <input type="hidden" value="{{ $trip->price }}" id="hidden_price">
                            <button type="submit" class="btn btn-success">Book Trip</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
