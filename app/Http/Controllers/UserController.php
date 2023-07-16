<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function users()
    {
        return view('dashboard.users')->with('users', User::all())->with('i');
    }

    public function filter_users(Request $request)
    {
        $users = User::role($request->role)->get();
        return view('dashboard.filtered_users', compact('users'))->with('i');
    }

    public function create_user()
    {
        return view('dashboard.create_user');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($request->role == 'rental_service'){
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'description' => $request->description,
                'contact_no' => $request->contact_no,
            ]);
            $user->assignRole('rental_service');
        }

        else if($request->role == 'vendor'){
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'description' => $request->description,
                'contact_no' => $request->contact_no,
            ]);
            $user->assignRole('vendor');
        }

        else if($request->role == 'tour_guide'){
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'language' => $request->language,
                'contact_no' => $request->contact_no,
            ]);
            $user->assignRole('tour_guide');
        }

        else {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $user->assignRole('tourist');
        }

        return redirect()->route('users');
    }


    public function show_user(User $user)
    {
        return view('dashboard.profile', compact('user'));
    }


    public function edit_user(User $user)
    {
        return view('dashboard.update_user', compact('user'));
    }

    public function destroy_user(User $user)
    {
        $user->delete();
        return redirect()->route('users');
    }

    public function update_user(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $user->update($request->all());

        return redirect()->route('users');
    }
}
