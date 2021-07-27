<?php

namespace Banco\Modelo\Funcionario;

use Banco\Modelo\Autenticavel;
use Banco\Modelo\Funcionario\Funcionario;

class Diretor extends Funcionario implements Autenticavel
{
    public function calcularBonificacao():float
    {
        return $this->recuperarSalario() * 2;
    }

    public function podeAutenticar(string $senha):bool
    {
        return $senha === '1234';
    }
}