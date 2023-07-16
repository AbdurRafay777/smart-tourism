@extends('dashboard.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('store_trip') }}" method="post">
        @method('POST')
        @csrf
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col">
                            <label> Your Rented Vehicles </label>
                            <select name="vehicle" class="vendor_vehicles form-control form-select-lg">
                                <option selected disabled value="">Select Vehicle</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle }}">{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                            <input value="" class="form-control no_of_seats invisible" type="hidden"
                                name="no_of_seats" id="hidden_seats">
                            @error('no_of_seats')
                                <div class="alert alert-danger error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-4">
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
                    <div class="row my-4">
                        <div class="col-md-6">
                            <label class="form-label"> Starting Date </label>
                            <input class="form-control" type="text" name="start_date" id="vehicle_start_date"
                                autocomplete="off" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Ending Date </label>
                            <input class="form-control" type="text" name="end_date" id="vehicle_end_date"
                                autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <label class="form-label"> Price </label>
                            <input class="form-control" type="number" name="price" id="price">
                            @error('price')
                                <div class="alert alert-danger error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-4 justify-content-end">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Add Trip</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
