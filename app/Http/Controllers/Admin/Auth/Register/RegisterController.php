<?php

namespace App\Http\Controllers\Admin\Auth\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registrationPage()
    {
        return view('admin.auth.registration');
    }
}
