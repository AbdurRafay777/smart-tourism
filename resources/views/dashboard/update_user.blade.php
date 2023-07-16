@extends('dashboard.main')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('update_user', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <strong>First Name</strong>
                <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Last Name</strong>
                <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}">
            </div>
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <button type="submit" class="btn btn-primary w-25">Submit</button>
            <a class="btn btn-danger w-25" href="{{ route('users') }}" title="Go back">Back</a>
    </form>
</div>
@endsection
