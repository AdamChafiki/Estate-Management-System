<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registers a new user and returns a View.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'firstName' => 'required|string|min:3',
            'lastName' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'same:password',
        ]);


        // dd($request->all());


        // Create a new user
        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return route with success message
        return to_route('login')->with('alert', [
            'level'   => 'success',
            'message' => 'Account created successfully',
        ]);
    }

    /**
     * Authenticates a user and returns a View.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to the home page
            return redirect()->route('home');
        }

        // Return back with an error message
        return back()->with('alert', [
            'level'   => 'error',
            'message' => 'Invalid credentials',
        ]);
    }

    /**
     * Logs out a user and returns a View.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Regenerate the session to prevent session fixation
        $request->session()->regenerate();

        // Redirect to the login page
        return redirect()->route('login');
    }
}