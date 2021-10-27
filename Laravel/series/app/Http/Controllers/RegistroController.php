<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.registrar');
    }

    public function store(Request $request)
    {
        //aqui pega todos os dados exceto o token
        $dados = $request->except('_token');
        $dados['password'] = Hash::make($dados['password']);

        $usuario = User::create($dados);

        Auth::login($usuario);

        return redirect()->route('listar_series');
    }
}
