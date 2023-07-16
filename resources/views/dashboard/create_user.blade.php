@extends('dashboard.main')

@section('content')

<div class="container my-5">
    <form action="{{ route('store_user') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="first_name" class="text-center col-md-4 col-form-label">First Name</label>
            <div class="col-md-6">
                <input type="first_name" name="first_name" id="first_name" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="last_name" class="text-center col-md-4 col-form-label">Last Name</label>
            <div class="col-md-6">
                <input type="last_name" name="last_name" id="last_name" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="text-center col-md-4 col-form-label">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="text-center col-md-4 col-form-label">Password</label>
            <div class="col-md-6">
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role_menu" class="text-center col-md-4 col-form-label">Role</label>
            <div class="col-md-6">
                <select class="form-select" id="role_menu" name="role">
                    <option selected disabled>Choose Your Role</option>
                    <option value="tourist">Tourist</option>
                    <option value="vendor">Vendor</option>
                    <option value="tour_guide">Tour Guide</option>
                    <option value="rental_service">Rental Service</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row contact_no invisible">
            <label class="text-center col-md-4 col-form-label">Contact No.</label>
            <div class="col-md-6">
                <input type="text" name="contact_no" id="contact_no" class="form-control">
            </div>
        </div>
        <div class="mb-3 row language invisible">
            <label class="text-center col-md-4 col-form-label">Language</label>
            <div class="col-md-6">
                <input type="text" name="language" id="language" class="form-control">
            </div>
        </div>
        <div class="mb-3 row description invisible">
            <label class="text-center col-md-4 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea type="text" name="description" id="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-6 offset-md-4 text-end">
            <button type="submit" class="btn btn-primary w-25">ADD</button>
            <a class="btn btn-danger w-25" href="{{ route('users') }}" title="Go back">Back</a>
        </div>
    </form>
</div>

@endsection
