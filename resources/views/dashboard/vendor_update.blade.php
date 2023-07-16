@extends('dashboard.main')

@section('content')
    <div class="container">
        <form action="{{ route('vendor_update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <h3 class="mt-2 ml-2">Edit Vendor Details</h3>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact No.</strong>
                        <input type="text" name="contact_no" class="form-control" value="{{ $user->contact_no }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description</strong>
                        <textarea name="description" class="form-control" value="{{ $user->description }}"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary w-25">Update</button>
                    <a class="btn btn-danger w-25" href="{{ route('vendor_list') }}" title="Go back">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
