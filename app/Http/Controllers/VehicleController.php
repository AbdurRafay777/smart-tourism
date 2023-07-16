<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Js;

class VehicleController extends Controller
{
    public function vehicles()
    {
        $rental_service = Auth::user();
        $vehicles = $rental_service->vehicles;
        return view('dashboard.vehicles', compact('vehicles'))->with('i');
    }

    public function create_vehicle()
    {
        return view('dashboard.create_vehicle')->with('types', Type::all());
    }

    public function store_vehicle(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);

        $vehicle = Vehicle::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ]);

        $vehicle->types()->attach($request->type);
        return redirect()->route('vehicles')->with('i');
    }

    public function update_vehicle(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles');
    }

    public function destroy_vehicle(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles');
    }

    public function edit_vehicle(Vehicle $vehicle)
    {
        return view('dashboard.update_vehicle', compact('vehicle'));
    }

    public function available_vehicles()
    {
        $rental_services = User::role('rental_service')->get();
        return view('dashboard.available_vehicles', compact('rental_services'));
    }

    public function rental_menu(Request $request)
    {
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $rental_service = User::find($request->rental_id);
        $vehicles = $rental_service->vehicles;

        $vehicles = $vehicles->whereNotBetween('start_date', [$start_date->subDay(), $end_date->addDay()])
            ->whereNotBetween('end_date', [$start_date->subDay(), $end_date->addDay()]);

        return view('vehicle_menu', compact('vehicles'));
    }
    public function vehicle_details(Request $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);
        $user_id = Auth::id();

        if ($vehicle->user_id == $request->rental_id) {

            $vehicle->start_date = Carbon::parse($request->start_date);
            $vehicle->end_date = Carbon::parse($request->end_date);
            $vehicle->save();
            $vehicle->vendors()->attach($user_id);

            return redirect()->route('booked_vehicles');
        }
        else{
            return back()->withErrors('The selected vehicle does not exist against selected rental service');
        }
    }

    public function booked_vehicles()
    {
        $vendor = Auth::user();
        $vehicles = $vendor->vendor_vehicles;
        $vehicles = $vehicles->sortBy('created_at');
        return view('dashboard.booked_vehicles', compact('vehicles'))->with('i');
    }

    public function rental_options(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $rental_services = User::whereHas('vehicles', function ($query) use ($start_date, $end_date) {
            $query->whereNotBetween('start_date', [Carbon::parse($start_date)->addDay(), Carbon::parse($end_date)->subDay()])
                ->whereNotBetween('end_date', [Carbon::parse($start_date)->addDay(), Carbon::parse($end_date)->subDay()]);
        })->get();

        return view('rental_options', compact('rental_services'));
    }

    public function cancel_vehicle_booking(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $user = Auth::user();
        $vehicle->vendors()->detach($user->id);
        return response()->json(['success' => 'Vehicle Cancelled']);
    }

    public function show_vehicle(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        return response()->json($vehicle);
    }
}
