@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-3">
                    <h1>Vehicles</h1>
                </div>
                <div class="col-3">
                    <a href="{{route('create_vehicle')}}" class="btn btn-success"> Add Vehicle </a>
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
                            <th style="width: 20%">Model</th>
                            <th style="width: 20%">Price</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vehicles as $vehicle)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->price }}</td>
                                <td class="project-actions">
                                    <form action="{{ route('destroy_vehicle', $vehicle->id) }}" method="POST">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('edit_vehicle', $vehicle->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
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
