<?php

namespace App\Http\Controllers\Admin\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return back()
                    ->with('error', 'Invalid email or password')
                    ->withInput();
            }

            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Login successful!');
        } catch (\Throwable $e) {
            info("Login Error: " . $e->getMessage());

            return back()
                ->with('error', 'Something went wrong. Please try again.')
                ->withInput();
        }
    }

    public function logout()
    {
        try {
            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return redirect()
                ->route('loginPage')
                ->with('success', 'Logged out successfully.');
        } catch (\Throwable $e) {
            info("Logout Error: " . $e->getMessage());

            return redirect()
                ->route('dashboard')
                ->with('error', 'Something went wrong while logging out.');
        }
    }
}
