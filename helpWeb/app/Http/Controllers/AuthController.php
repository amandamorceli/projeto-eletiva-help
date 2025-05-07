<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credenciais = $request->only('c_login', 'c_senha');
        $request->validate(['c_login' => 'required|c_login', 'c_senha' => 'required']);
        
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            // adcionar lógica se ao fazer login, acessos forem diferentes
            return redirect()->intended('help');
        }

        return back()->withErrors(['login'=>'As credenciais fornecidas estão incorretas!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }
    
}
