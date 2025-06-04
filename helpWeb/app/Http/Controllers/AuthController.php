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
            'login' => 'required',
            'senha' => 'required'
        ]);

        // Busca o usuário pelo login
        $user = User::where('login', $request->login)->first();

        // Verifica se o usuário existe e a senha está correta
        if ($user && Hash::check($request->senha, $user->senha)) {
            
            Auth::login($user);

            $request->session()->regenerate();

            if ($user->tipo_usuario === 'U') {
                return redirect()->intended('/help');
            } elseif ($user->tipo_usuario === 'T') {
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
