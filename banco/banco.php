<?php

require_once 'src/autoload.php';

use Banco\Modelo\Conta\{Conta, ContaCorrente, ContaPoupanca, Titular};
use Banco\Modelo\{Endereco, CPF};
use Banco\Modelo\Funcionario\{Desenvolvedor, Diretor, EditorDeVideo, gerente};
use Banco\Service\Autenticador;
use Banco\Service\ControladorDeBonificacoes;

$endereco = new Endereco('Rio de Janeiro', 'Centro', 'avenida Presidente Vargas', '233');
$vinicius = new Titular(new CPF('123.456.789-10'), 'Vinicius Dias', $endereco);
$primeiraConta = new ContaCorrente($vinicius);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300); // isso é ok

//echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
//echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
//echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('698.549.548-10'), 'Patricia', $endereco);
$segundaConta = new ContaCorrente($patricia);
//print_r($primeiraConta);
//print_r($segundaConta);

$outroEndereco = new Endereco('a', 'b', 'c', '1D');
$outra = new ContaCorrente(new Titular(new CPF('123.654.789-01'), 'Abcdefg', $outroEndereco));
//print_r($outra);
unset($segundaConta);
//echo Conta::recuperaNumeroDeContas();


$end = new Endereco('rio', 'cg', 'street', '123');
//print_r($end);

$cpf = new CPF('698.549.548-10');
//print_r($cpf);

$cpfFunc = new CPF('123.654.789-01');
//print_r($cpfFunc);

$titu = new Titular($cpf, 'João', $end);
//print_r($titu);

$cc = new ContaCorrente($titu);
//print_r($cc);

$cp = new ContaPoupanca($titu);
//print_r($cp);

$cc->depositar(1000);
//echo $cc->recuperaSaldo().PHP_EOL;
$cc->sacar(100);
//echo $cc->recuperaSaldo().PHP_EOL;

$cp->depositar(1000);
//echo $cp->recuperaSaldo().PHP_EOL;
$cp->sacar(100);
//echo $cp->recuperaSaldo().PHP_EOL;

$auth = new Autenticador();
$diretor = new Diretor('brow peão', $cpfFunc, 15000);
$gerente = new Gerente('Arao Garcia', $cpfFunc, 10000);
$dev = new Desenvolvedor('Rafael Cunha', $cpfFunc, 3000);
$edit = new EditorDeVideo('pedro' , $cpfFunc, 3500);

print_r($gerente);
print_r($dev);
print_r($edit);

echo $dev->recuperarSalario() . PHP_EOL;
$dev->sobeDeNivel();
echo $dev->recuperarSalario() . PHP_EOL;

$controladorBonificacao = new ControladorDeBonificacoes();

$controladorBonificacao->adicionaBonificacaoDe($gerente);
echo 'total de bonificacoes: ' . $controladorBonificacao->recuperarTotal() . PHP_EOL;

$controladorBonificacao->adicionaBonificacaoDe($dev);
echo 'total de bonificacoes: ' . $controladorBonificacao->recuperarTotal() . PHP_EOL;

$auth->tentarLogar($diretor, '1230'); //1234
$auth->tentarLogar($gerente, '4320'); //4321
$auth->tentarLogar($vinicius, '2020'); //2021