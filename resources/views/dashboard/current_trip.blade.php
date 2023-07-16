@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-3">
                    <h1>My Trips</h1>
                </div>
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
                            <th style="width: 15%">Departure</th>
                            <th style="width: 15%">Destination</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 15%">Start Date</th>
                            <th style="width: 15%">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->trips as $trip)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $trip->departure_city->name }}</td>
                                <td>{{ $trip->destination_city->name }}</td>
                                <td>{{ $trip->price }}</td>
                                <td>{{ $trip->start_date }}</td>
                                <td>{{ $trip->end_date }}</td>
                                <td class="project-actions">
                                        <button class="btn btn-danger btn-sm cancelBtn" value="{{$trip->id}}">
                                            <i class="far fa-window-close"></i>
                                            Cancel
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
