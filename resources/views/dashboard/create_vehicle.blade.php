@extends('dashboard.main')

@section('content')
    <form action="{{ route('store_vehicle') }}" method="post">
        @method('POST')
        @csrf
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row my-5">
                        <label class="form-label"> Name </label>
                        <input class="form-control" type="text" name="name" id="name">
                        @error('name')
                            <div class="alert alert-danger error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-5">
                        <label class="form-label"> Price </label>
                        <input class="form-control" type="number" name="price" id="price">
                        @error('price')
                            <div class="alert alert-danger error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-5">
                        <label for="type" class="form-label"> Vehicle Type </label>
                        <select name="type" class="form-select form-select-lg">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="alert alert-danger error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row my-5 justify-content-end">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Add vehicle</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
