@extends('dashboard.main')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('update_trip', $trip->id) }}" method="POST">
            @csrf
            @method('PUT')
            <section class="content">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="row mb-5 my-1">
                            <div class="col-md-6">
                                <label class="form-label"> Departure </label>
                                <select name="departure" class="city_menu form-control form-select-lg">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"> Destination </label>
                                <select name="destination" class="city_menu form-control form-select-lg">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6">
                                <label class="form-label"> Starting Date </label>
                                <input class="form-control" type="text" name="start_date" id="trip_start_date"
                                    autocomplete="off" value="{{ $trip->start_date }}">
                                <input type="hidden" id="hidden_start_date" value="{{ $trip->start_date }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"> Ending Date </label>
                                <input class="form-control" type="text" name="end_date" id="trip_end_date"
                                    autocomplete="off" value="{{ $trip->end_date }}">
                                <input type="hidden" id="hidden_end_date" value="{{ $trip->end_date }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-25">Submit</button>
                        <a class="btn btn-danger w-25" href="{{ route('trips') }}" title="Go back">Back</a>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
