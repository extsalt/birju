<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (auth()->check()) return redirect('/dashboard');

        if (auth()->attempt($request->validated())) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email or password is wrong.');
    }
}
