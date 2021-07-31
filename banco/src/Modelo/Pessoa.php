<?php
namespace Banco\Modelo;

class Pessoa
{
    protected $nome;
    protected $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome():string
    {
        return $this->nome;
    }

    public function recuperaCpf():string
    {
        return $this->cpf->recuperaNumero();
    }

    protected function validaNome(string $nome):void
    {
        if (strlen($nome) < 5) {
            throw new validaNomeException();
        }
    }
}