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
        $request->validate(['c_login' => 'required', 'c_senha' => 'required']);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->f_tipo_usuario === 'U') {
                return redirect()->intended('/help');
            } elseif ($user->f_tipo_usuario === 'T') {
                return redirect()->intended('/chamados.show');
            }

            Auth::logout();
            return redirect('/login')->withErrors(['access' => 'Nível de usuário inválido! Entre em contato com o administrador.']);
        }

        return back()->withErrors(['login' => 'As credenciais fornecidas estão incorretas!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
