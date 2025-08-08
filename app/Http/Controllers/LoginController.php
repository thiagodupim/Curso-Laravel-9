<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) 
    {
        $credenciais = $request->validade([
            'email' => ['required', 'email'], // Além do campo ser obrigatório o e-mail também tem que ser válido
            'password' => ['required'],
        ]);

        /* attempt vai pegar as credenciais e verificar se existe usuários com essas credenciais no banco
           Se houver a sessão vai ser criada, se não houver não será criada */
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate(); //Gera um novo id para sessão
            return redirect()->intended('dashboard'); // Faz o redirecionamento verificando se o usuário veio de algum lugar 
        } else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválida.');
        }
    }
}
