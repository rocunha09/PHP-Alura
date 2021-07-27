<?php
namespace Banco\Conta;
use Banco\Modelo\Pessoa;
use Banco\Modelo\CPF;
use Banco\Modelo\Endereco;

class Titular extends Pessoa
{
    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }


    public function recuperaEndereco():Endereco
    {
        return $this->endereco;
    }
}

