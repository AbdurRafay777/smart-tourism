@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-3">
                    <h1>Users</h1>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <div class="mb-3">
                            <select class="roles form-select form-select-lg">
                                <option selected disabled value="">Select Role</option>
                                <option value="tourist">Tourist</option>
                                <option value="vendor">Vendor</option>
                                <option value="tour_guide">Tour Guide</option>
                                <option value="rental_service">Rental Service</option>
                            </select>
                            <button class="btn btn-primary" id="filter">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <a href="{{ route('create_user') }}" class="btn btn-success"> Add User </a>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

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
                <table class="table table-striped users">
                    <thead>
                        <tr>
                            <th style="width: 1%"> No.</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 20%">Contact No.</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact_no }}</td>
                                <td class="project-actions">
                                    <form action="{{ route('destroy_user', $user->id) }}" method="POST">
                                        <a class="btn btn-primary btn-sm" href="{{ route('show_user', $user->id) }}">
                                            <i class="fas fa-folder"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('edit_user', $user->id) }}">
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
