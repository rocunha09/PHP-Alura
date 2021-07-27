<?php
namespace Banco\Modelo\Funcionario;

use Banco\Modelo\Pessoa;
use Banco\Modelo\CPF;

abstract class Funcionario extends Pessoa
{
    private $salario;

    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function alteraNome($nome):void
    {
        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public function recuperarSalario():float
    {
        return $this->salario;
    }

    abstract public function calcularBonificacao():float;

    public function promocao(float $valorAumento): void
    {
        if($valorAumento <= 0){
            echo "valor do aumento deve ser Maior que Zero";
            return;
        }

        $this->salario += $valorAumento;
    }
}