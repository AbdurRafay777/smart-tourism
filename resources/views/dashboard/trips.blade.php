@extends('dashboard.main')

@section('content')
    <section class="content-header bg-dark">
        <div class="container-fluid">
            <div class="row mb-2">
                @hasanyrole('Super-Admin|vendor')
                    <div class="col-3">
                        <h1>My Trips</h1>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('create_trip') }}" class="btn btn-success"> Add Trip </a>
                    </div>
                @else
                    <div class="col-3">
                        <h1>All Available Trips</h1>
                    </div>
                @endhasanyrole
            </div>
        </div> <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trips</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped trips">
                    <thead>
                        <tr>
                            <th style="width: 1%"> No.</th>
                            <th style="width: 13%">Departure</th>
                            <th style="width: 13%">Destination</th>
                            <th style="width: 13%">Price</th>
                            <th style="width: 13%">Available Seats</th>
                            <th style="width: 13%">Start Date</th>
                            <th style="width: 13%">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trips as $trip)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $trip->departure_city->name }}</td>
                                <td>{{ $trip->destination_city->name }}</td>
                                <td>{{ $trip->price }}</td>
                                @if ($trip->no_of_seats == 0)
                                    <td class="text-center"> - </td>
                                @else
                                    <td class="text-center">{{ $trip->no_of_seats }}</td>
                                @endif
                                <td>{{ $trip->start_date }}</td>
                                <td>{{ $trip->end_date }}</td>
                                @hasanyrole('Super-Admin|vendor')
                                    <td class="project-actions">
                                        @if (\Carbon\Carbon::parse($trip->start_date) > \Carbon\Carbon::now()->addDays(3))
                                            @if (!App\Models\TripUser::where('trip_id', $trip->id)->exists())
                                                <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                                    title="Edit Trip" href="{{ route('edit_trip', $trip->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endif
                                        @endif
                                        <a href="{{ route('destroy_trip', $trip->id) }}" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="Delete Trip">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a data-vehicle_id="{{ $trip->vehicle_id }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Vehicle" class="btn btn-warning btn-sm trip_vehicle">
                                            <i class="fas fa-car"></i>
                                        </a>
                                    </td>
                                @else
                                    @if (!(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($trip->start_date)) < 2))
                                        <td>
                                            <a class="btn btn-info btn-md" data-toggle="tooltip" data-placement="bottom"
                                                title="Book Trip" href="{{ route('book_trip', $trip->id) }}">
                                                <i class="fas fa-book"></i>
                                            </a>
                                        </td>
                                    @endif
                                @endhasanyrole
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                <p>No Record Found</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
