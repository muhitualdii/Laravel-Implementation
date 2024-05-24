<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'address' => 'required|string',
            'role' => 'required|in:superadmin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'dob' => $request->dob,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        } else {
            return redirect()->route('register')->with('error', 'Registration failed. Please try again.');
        }
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->route('login')->with('error', 'Login failed. Email or password is incorrect.');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('dashboard.dashboard.index', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('auth.register', compact('user'));
}


public function loginGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function loginGoogleCallback()
{
    $user = Socialite::driver('google')->user();

    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
        Auth::login($existingUser);
    } else {
        $newUser = new User();
        $newUser->google_id = $user->id;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = Hash::make(Str::random(15));
        $newUser->gender = 'male';
        $newUser->age = 25;
        $newUser->dob = '1996-05-13';
        $newUser->address = 'Jakarta Selatan';
        $newUser->save();

        Auth::login($newUser);
    }

    return redirect()->route('dashboard');
}


}
