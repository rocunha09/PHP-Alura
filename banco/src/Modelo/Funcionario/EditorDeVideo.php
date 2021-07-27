<?php
namespace Banco\Modelo\Funcionario;

use Banco\Modelo\Funcionario\Funcionario;

class EditorDeVideo extends Funcionario
{
    public function calcularBonificacao(): float
    {
        return 600;
    }
}