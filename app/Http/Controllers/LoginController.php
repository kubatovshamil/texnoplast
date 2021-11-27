<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController
{

    public function index()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'surname' => 'required',
            'name' => 'required',
            'password' => 'required',
            'password2' => 'required'
        ]);
        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        if(auth()->attempt(request(['email', 'password'])))
        {
            return redirect('/');
        }
        return abort(404);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->invalidate();

        $request->session()->invalidate();

        return redirect('/');
    }

}
