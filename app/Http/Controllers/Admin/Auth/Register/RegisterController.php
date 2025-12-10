<?php

namespace App\Http\Controllers\Admin\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RegistrationRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registrationPage()
    {
        return view('admin.auth.registration');
    }

    public function registration(RegistrationRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 3,
            ]);

            DB::commit();

            return redirect()
                ->route('loginPage')
                ->with('success', 'Registration Successful! Login with your credentials.');
        } catch (\Throwable $e) {
            DB::rollBack();
            info("Registration Error: " . $e->getMessage());

            return back()
                ->with('error', 'Something went wrong.')
                ->withInput();
        }
    }
}
