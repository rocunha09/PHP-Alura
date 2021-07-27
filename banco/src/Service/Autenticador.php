<?php
namespace Banco\Service;

use Banco\Modelo\Autenticavel;
use Banco\Modelo\Funcionario\Diretor;

class Autenticador 
{
    public function tentarLogar(Autenticavel $autenticavel, $senha):void
    {
        if (!$autenticavel->podeAutenticar($senha)) {
            echo 'senha incorreta, não foi possível realizar login' . PHP_EOL;
        } else {
            echo 'Logado no sistema' . PHP_EOL;

        }

    }

}