@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-3">
                    <h1>Vehicles</h1>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Vehicles</h3>

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
                <table class="table table-striped vehicles">
                    <thead>
                        <tr>
                            <th style="width: 1%"> No.</th>
                            <th style="width: 16%">Model</th>
                            <th style="width: 16%">Price</th>
                            <th style="width: 16%">Start Date</th>
                            <th style="width: 16%">End Date</th>
                            <th style="width: 16%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vehicles as $vehicle)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->price }}</td>
                                <td>{{$vehicle->start_date}}</td>
                                <td>{{$vehicle->end_date}}</td>
                                <td></td>
                                <td class="project-actions">
                                    <button class="btn btn-warning btn-sm get_trip" data-toggle="tooltip"
                                    data-placement="bottom" title="Trips" value="{{$vehicle->id}}">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm cancel_vehicle" data-toggle="tooltip"
                                    data-placement="bottom" title="Cancel" value="{{$vehicle->id}}">
                                        <i class="far fa-window-close"></i>
                                    </button>
                            </td>
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
