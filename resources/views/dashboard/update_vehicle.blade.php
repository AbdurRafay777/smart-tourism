@extends('dashboard.main')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('update_vehicle', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" value="{{ $vehicle->name }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Price</strong>
                <input class="form-control" type="text" name="price" id="price" value="{{ $vehicle->price }}">
            </div>

            <button type="submit" class="btn btn-primary w-25">Submit</button>
            <a class="btn btn-danger w-25" href="{{ route('vehicles') }}" title="Go back">Back</a>
    </form>
</div>
@endsection
