<option selected disabled value="">Select Rental Service</option>
@foreach ($rental_services as $rental)
    <option value="{{ $rental->id }}">{{ $rental->first_name }} {{ $rental->last_name }}
    </option>
@endforeach
