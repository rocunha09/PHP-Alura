<?php

namespace  Banco\Modelo\Funcionario;

use Banco\Modelo\Funcionario\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function sobeDeNivel()
    {
        $this->promocao($this->recuperarSalario() * 0.5);
    }

    public function calcularBonificacao():float
    {
        return 500.0;

    }
}