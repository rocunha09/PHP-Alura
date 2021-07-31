<?php

use Banco\Modelo\Conta\{ContaPoupanca, ContaCorrente, SaldoInsuficienteException, Titular};
use Banco\Modelo\{CPF, Endereco};

require_once 'src/autoload.php';

$conta = new ContaPoupanca(
    new Titular(
        new CPF('123.456.789-10'),
        'Rafael',
        new Endereco('Rio de Janeiro', 'Centro', 'big street', '09')
    )
);
$conta->depositar(500);

try {
    $conta->sacar(600);

} catch (SaldoInsuficienteException $e) {
    echo "Você não tem saldo para realizar este saque." . PHP_EOL;
    echo $e->getMessage().PHP_EOL;
}

echo $conta->recuperaSaldo();
