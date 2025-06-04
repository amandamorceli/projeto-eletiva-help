<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'c_login' => 'required',
            'c_senha' => 'required'
        ]);

        // Busca o usuário pelo login
        $user = User::where('c_login', $request->c_login)->first();

        // Verifica se o usuário existe e a senha está correta
        if ($user && Hash::check($request->c_senha, $user->c_senha)) {
            
            Auth::login($user);

            $request->session()->regenerate();

            if ($user->f_tipo_usuario === 'U') {
                return redirect()->intended('/help');
            } elseif ($user->f_tipo_usuario === 'T') {
                return redirect()->intended('/help');
            }

            Auth::logout();
            return redirect('/login')->withErrors([
                'access' => 'Nível de usuário inválido! Entre em contato com o administrador.'
            ]);
        }

        return back()->withErrors([
            'login' => 'As credenciais fornecidas estão incorretas!'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
