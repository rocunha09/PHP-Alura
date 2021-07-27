<?php
namespace Banco\Service;

use Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes 
{
    private $totalBonificacoes = 0;
    
    public function adicionaBonificacaoDe(Funcionario $funcionario)
    {
        $this->totalBonificacoes += $funcionario->calcularBonificacao();
    }

    public function recuperarTotal():float
    {
        return $this->totalBonificacoes;
    }
}