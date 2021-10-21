<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(302, ['Location'=>'/login']);

        $email = filter_var($request->getParsedBody()['email'],FILTER_VALIDATE_EMAIL);
        $senha = filter_var($request->getParsedBody()['senha'],FILTER_SANITIZE_STRING);

        if(is_null($email) || $email === false){
            $this->defineMensagem('danger', 'Email Inválido');

            return $response;

        }else {
            $usuario = $this->repositorioDeUsuarios->findOneBy(['email'=>$email]);

            if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha) || $senha == ''){
                $this->defineMensagem('danger', 'E-mail ou senha Inválidos');

                return $response;
            }

            if(!isset($_SESSION)){
                session_start();
            } else {
                session_destroy();
                session_start();
            }
            
            $_SESSION['logado'] = true;

            return new Response(302, ['Location'=>'/listar-cursos']);
        }

    }
}