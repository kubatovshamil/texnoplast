<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

class AdminLoginController
{

    public function login(Request $request)
    {
        if(auth()->attempt(request(['email', 'password'])))
        {
            return redirect('/admin');
        }
        return redirect('/admin');
    }
}
