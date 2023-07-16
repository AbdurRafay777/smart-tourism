<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function trips()
    {
        $user = User::find(Auth::id());
        if($user->hasRole('tourist'))
        {
            $current_date = date('Y-m-d');
            echo "<script>console.log( 'Debug Objects: " . $current_date . "' );</script>";
            $trips = Trip::all();
            $trips = $trips->SortByDesc('id');
            return view('dashboard.trips', compact('trips'))->with('i')->with('current_date');
        }

        else{
            $trips = $user->vendor_trips;
            $trips = $trips->SortByDesc('id');
            return view('dashboard.trips',compact('trips'))->with('i');
        }
    }

    public function create_trip()
    {
        $vendor = Auth::user();
        $vehicles = $vendor->vendor_vehicles;
        $vehicles = $vehicles->where('start_date', '>', Carbon::now())
                            ->where('end_date','>', Carbon::now());
        return view('dashboard.create_trip', compact('vehicles'))->with('cities', City::all());
    }

    public function store_trip(Request $request)
    {

        $vehicle = json_decode($request->vehicle);

        $request->validate([
            'departure' => 'required',
            'destination' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'no_of_seats' => 'required'
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if($request->departure == $request->destination){
            return back()->withErrors('Departure and Destination cannot be the same');
        }
        elseif(Carbon::now()->diffInDays(Carbon::parse($start_date)) < 2 ){
            return back()->withErrors('Starting Date must be atleast 2 days after the current date.');
        }
        elseif($start_date >= $end_date){
            return back()->withErrors('Starting Date must be greater than current date.');
        }
        else{
            Trip::create([
                'departure' => $request->departure,
                'destination' => $request->destination,
                'user_id' => Auth::user()->id,
                'vehicle_id' => $vehicle->id,
                'start_date' => Carbon::parse($request->start_date),
                'end_date' => Carbon::parse($request->end_date),
                'price' => $request->price,
                'no_of_seats' => $request->no_of_seats
            ]);
            return redirect()->route('trips');
        }
    }

    public function edit_trip(Trip $trip)
    {
        return view('dashboard.update_trip', compact('trip'))->with('cities', City::all());
    }

    public function update_trip(Request $request, Trip $trip)
    {
        $trip->update($request->all());

        return redirect()->route('trips');
    }

    public function destroy_trip(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips');
    }

    public function cancel_trip(Request $request)
    {
        $trip = Trip::find($request->id);
        $user = Auth::user();
        echo "<script>console.log( 'Debug Objects: " . $user . "' );</script>";
        $trip->users()->detach($user->id);
        return response()->json(['success' => 'Trip Cancelled']);
    }


    public function book_trip(Trip $trip)
    {
        return view('dashboard.book_trip', compact('trip'));
    }

    public function post_booked_trip(Request $request, Trip $trip)
    {
        $book_trip = Trip::find($trip->id);
        $user_id = Auth::user()->id;
        $book_trip->users()->attach($user_id);

        $book_trip->no_of_seats -= $request->no_of_seats;
        $book_trip->save();

        return redirect()->route('current_trip');
    }

    public function current_trip()
    {
        $user = Auth::user();
        return view('dashboard.current_trip', compact('user'))->with('i');
    }

    public function get_seats(Request $request)
    {
        $vehicle = Vehicle::find($request->id);

        $vehicle_type = $vehicle->types;

        $seats = $vehicle_type[0]->seats;

        return response()->json($seats);
    }

    public function show_trip(Request $request)
    {
        $trip = Trip::where('vehicle_id',$request->vehicle_id)->first();

        $departure = $trip->departure_city->name;
        $destination = $trip->destination_city->name;
        if(Carbon::now() < Carbon::parse($trip->end_date)){
            $data = ['departure' => $departure, 'destination' => $destination, 'status' => 0];
            return response()->json($data);
        }

        else{
            $data = ['departure' => $departure, 'destination' => $destination, 'status' => 1];
            return response()->json($data);
        }
    }
}
