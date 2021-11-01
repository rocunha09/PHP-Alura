<?php

namespace App\Providers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function (Request $request) {
            //o token virá pelo header Authorization
            if (!$request->hasHeader('Authorization')) {
                return null;
            }
            $authorizationHeader = $request->header('Authorization');

            //para usar o token é preciso fazer replace no portador[bearer]
            $token = str_replace('Bearer ', '', $authorizationHeader);

            //informa-se o token, a chave, e o algoritmo para realizar o decode, neste caso
            //deve retornar o email do usuário armazenado no banco
            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            //return new GenericUser(['email' => $dadosAutenticacao]);

            return User::where('email',$dadosAutenticacao->email)->first();
        });
    }
}
