<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();
        $data['password'] = Hash::make($registerRequest->get('password'));

        $user = User::create($data);

        return redirect('/dashboard');
    }
}
