<?php

use Banco\Modelo\Conta\ContaCorrente;
use Banco\Modelo\Conta\Titular;
use Banco\Modelo\CPF;
use Banco\Modelo\Endereco;
use Banco\Modelo\validaNomeException;

require_once 'src/autoload.php';

try{
    $cpf = new CPF('456.123.456-50');

}catch(InvalidArgumentException $e){
    echo "O número do CPF digitado é inválido, tente novamente.";
    exit();
}

try {
 $titular = new Titular($cpf, 'Rafael', new Endereco('Rio de Janeiro', 'Centro', 'big street', '09'));

}catch(validaNomeException $e){
    echo "o Nome informado é inválido, pois possui poucos caracteres.";
    exit();
}

$contaCorrente = new ContaCorrente($titular);

try{
    $contaCorrente->depositar(100);

}catch(InvalidArgumentException $e){
    echo "Valor a depositar precisa ser positivo";

}