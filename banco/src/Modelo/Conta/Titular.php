<?php
namespace Banco\Modelo\Conta;

use Banco\Modelo\Autenticavel;
use Banco\Modelo\Pessoa;
use Banco\Modelo\CPF;
use Banco\Modelo\Endereco;

class Titular extends Pessoa implements Autenticavel
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

    public function podeAutenticar(string $senha):bool
    {
        return $senha === '2021';
    }
}


