<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {

        $rules = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $rules['password'] = bcrypt($rules['password']);
        User::create($rules);

        return redirect('/login');
    }
}
