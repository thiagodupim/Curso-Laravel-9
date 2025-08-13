<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) 
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'], // Além do campo ser obrigatório o e-mail também tem que ser válido
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O email não é válido',
            'password.required' => 'O campo senha é obrigatório!',
        ]);

        /* attempt vai pegar as credenciais e verificar se existe usuários com essas credenciais no banco
           Se houver a sessão vai ser criada, se não houver não será criada */
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate(); //Gera um novo id para sessão
            return redirect()->intended('/admin/dashboard'); // Faz o redirecionamento verificando se o usuário veio de algum lugar 
        } else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválida.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site.index');
    }

    public function create() 
    {
        return view('login.create');
    }
}
