<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Usuario;

class RealizarLogin implements InterfaceControladorRequisicao
{
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        //pegar dados do formulario
        //verifica o password
        ///redireciona para listar-cursos caso retorne true, ou para login com erro caso retorne false.
        
        
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if(is_null($email) || $email === false){
            echo "Email Inválido";
            return;

        }else {
            $usuario = $this->repositorioDeUsuarios->findOneBy(['email'=>$email]);

            if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
                echo "E-mail ou senha Inválidos";
                return;
            }
            
            session_start();
            $_SESSION['logado'] = true;

            header('Location: /listar-cursos', true, 302);

        }        

    }
}