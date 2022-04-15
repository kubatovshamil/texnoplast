<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy("id", "desc")->paginate(6)
        ]);
    }


    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email',
            'surname' => 'required',
            'name' => 'required',
        ]);

         $user->update($request->all());
         return redirect()->route('users.index')
            ->with('message', 'Успешно обновлен пользователь');

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('message', 'Успешно удален пользователь');
    }

}
