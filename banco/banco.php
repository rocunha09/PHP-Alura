<?php

require_once 'src/autoload.php';

use Banco\Conta\Titular;
use Banco\Modelo\Endereco;
use Banco\Modelo\CPF;
use Banco\Conta\Conta;
use Banco\Modelo\Funcionario;
use Banco\Conta\ContaPoupanca;


$endereco = new Endereco('Rio de Janeiro', 'Centro', 'avenida Presidente Vargas', '233');
$vinicius = new Titular(new CPF('123.456.789-10'), 'Vinicius Dias', $endereco);
$primeiraConta = new Conta($vinicius);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('698.549.548-10'), 'Patricia', $endereco);
$segundaConta = new Conta($patricia);
print_r($primeiraConta);
print_r($segundaConta);

$outroEndereco = new Endereco('a', 'b', 'c', '1D');
$outra = new Conta(new Titular(new CPF('123.654.789-01'), 'Abcdefg', $outroEndereco));
print_r($outra);
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();


$end = new Endereco('rio', 'cg', 'street', '123');
print_r($end);

$cpf = new CPF('698.549.548-10');
print_r($cpf);

$cpfFunc = new CPF('123.654.789-01');
print_r($cpfFunc);

$titu = new Titular($cpf, 'João', $end);
print_r($titu);

$cc = new Conta($titu);
print_r($cc);

$cp = new ContaPoupanca($titu);
print_r($cp);

$func = new Funcionario('Joaquim', $cpfFunc, 'Atendimento');

$cc->depositar(1000);
echo $cc->recuperaSaldo().PHP_EOL;
$cc->sacar(100);
echo $cc->recuperaSaldo().PHP_EOL;

$cp->depositar(1000);
echo $cp->recuperaSaldo().PHP_EOL;
$cp->sacar(100);
echo $cp->recuperaSaldo().PHP_EOL;