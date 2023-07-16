<select name="vehicle_id" class="vehicles form-control form-select-lg">
    <option selected disabled value="">Select Vehicle</option>
    @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
    @endforeach
</select>
