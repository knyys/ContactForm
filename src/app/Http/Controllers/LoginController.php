<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (auth()->attempt($validatedData)) {
            return redirect()->intended('/');
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'ログアウトしました。');
    }
    
}
