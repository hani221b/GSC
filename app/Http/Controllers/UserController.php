<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view("users.index", compact("users"));
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('users.index')->with('success', 'User registered successfully');
        } catch (\Exception $e) {
            return back()->withErrors(provider: ['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('users.index')->with('success', 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return back()->withErrors(provider: ['error' => 'User not found']);
        }
        return view('users.edit', ['user' => $user]);
    }

    public function update(EditUserRequest $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return back()->withErrors(provider: ['error' => 'User not found']);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route("users.index")->with("success", "Profile updated successfully!");

    }
}
