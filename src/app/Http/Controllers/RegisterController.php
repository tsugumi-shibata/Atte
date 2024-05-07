<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        $register = $request->only(['name','email','password']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/login');
    }
}
