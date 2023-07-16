<select disabled class="rentals form-control form-select-lg">
    <option selected disabled value="">Select Rental Service</option>
    @foreach ($rental_services as $rental)
    <option value="{{ $rental->id }}">{{ $rental->first_name }} {{ $rental->last_name }}
    </option>
    @endforeach
</select>
