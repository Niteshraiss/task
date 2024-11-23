<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('main', compact('states'));
    }
    public function getcity(Request $request)
    {
        if ($request->ajax()) {
            $stateId = $request->id;
            if ($stateId) {
                $cities = City::where('state_id', $stateId)->get();
                if ($cities->isNotEmpty()) {
                    return response()->json(['status' => 200, 'data' => $cities]);
                } else {
                    return response()->json(['status' => 404, 'message' => 'No cities found for the selected state.']);
                }
            }
            return response()->json(['status' => 400, 'message' => 'State ID is required.']);
        }

        return response()->json(['status' => 400, 'message' => 'Invalid request.']);
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            "name" => "required|string",
            "surname" => "required|string",
            "email" => "required|email|unique:users,email",
            "phone" => "required|digits:10",
            "address" => "required|string",
            "pincode" => "required|digits:6",
            "state_id" => "required|exists:states,id",
            "city_id" => "required|exists:cities,id",
            "password" => "required|min:8|confirmed"
        ]);
        if ($validation) {
            User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'pincode' => $request->pincode,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('login')->with('success', 'Registraion successful');
        } else {
            return redirect()->route('index')->with('error', 'Registration failed');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8"
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Welcome back');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    public function dashboard()
    {
        $user=User::with('city','state')->get();
        return view('dashboard',['user'=>$user]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
