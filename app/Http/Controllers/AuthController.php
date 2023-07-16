<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->remember;

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'Email is invalid',
            'password' => 'Password is invalid'
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($request->all());
        switch ($request->role) {
            case 'vendor':
                $user->assignRole('vendor');
                return redirect()->route('login')->with('success','Registeration Successfull');
                break;
            case 'admin':
                $user->assignRole(Role::findByName('Super-Admin'));
                return redirect()->route('login')->with('success','Registeration Successfull');
                break;
            case 'tourist':
                $user->assignRole('tourist');
                return redirect()->route('login')->with('success','Registeration Successfull');
                break;
            default:
                $user->assignRole('tourist');
                return redirect()->route('login')->with('success','Registeration Successfull');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        if (Auth::check()) {
            return view('dashboard.profile')->with(compact('user'));
        }

        return back()->withErrors('User not authenticated');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
