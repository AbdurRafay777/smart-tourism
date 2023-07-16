@extends('dashboard.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card text-center">
            <div class="card-body">
                <label> Name </label>
                <p class="card-text">{{ $user->first_name }} {{ $user->last_name }}</p>
                <label> Email </label>
                <p class="card-text">{{ $user->email }}</p>
                @if ($user->hasRole('vendor') or $user->hasRole('tour_guide') or $user->hasRole('rental_service'))
                    <label> Contact No. </label>
                    <p class="card-text">{{ $user->contact_no }}</p>
                    <label> Description </label>
                    <p class="card-text">{{ $user->description }}</p>
                @endif

                @if ($user->hasRole('tour_guide'))
                    <label> Language </label>
                    <p class="card-text">{{ $user->language }}</p>
                @endif
            </div>
        </div>
    </section>
@endsection
