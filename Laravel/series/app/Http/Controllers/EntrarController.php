<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }

    public function entrar(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário e/ou senha inválidos');
        }

        return redirect()->route('listar_series');
    }
}

/*
 * Auth::attempt($request->only(['email', 'password'])
 * Este método espera receber os dados necessários para buscar um usuário no banco
 * de dados, e ao encontrá-lo, realiza o processo de login, salvando os dados do usuário na sessão.
 */
