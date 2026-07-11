<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('LoginPage.Login');
    }
    public function Register()
    {
        return view('LoginPage.Register');
    }
}
