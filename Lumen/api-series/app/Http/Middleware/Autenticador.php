<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            //o token virá pelo header Authorization
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }
            $authorizationHeader = $request->header('Authorization');

            //para usar o token é preciso fazer replace no portador[bearer]
            $token = str_replace('Bearer ', '', $authorizationHeader);

            //informa-se o token, a chave, e o algoritmo para realizar o decode, neste caso
            //deve retornar o email do usuário armazenado no banco
            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            $usuario = User::where('email',$dadosAutenticacao->email)->first();

            if(is_null($usuario)){
                throw new \Exception();
            }

            return $next($request);

        }catch (\Exception $e) {
            return response()->json('Não Autorizado');
        }

    }
}
