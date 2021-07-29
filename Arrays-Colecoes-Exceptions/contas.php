<?php
//iterando arrays
$saldos = [
  2500,
  3000,
  4400,
  1000,
  8700,
  9000
];

foreach ($saldos as $saldo){
    echo "O saldo é: $saldo" .PHP_EOL;
}
//ordenando o array para pegar o menor saldo direto na primeira posição
sort($saldos);

echo "O menor saldo da lista é: $saldos[0]" . PHP_EOL;

echo PHP_EOL;
//--------------------------------------------
//explode e implode
//realizado explode em uma string para gerar um array que possa ser iterado
$nomes = "Giovani, João, Maria, Pedro";
$listaNomes = explode(", ",$nomes);

foreach($listaNomes as $nome){
    echo $nome . PHP_EOL;
}

//realizando implode no array gerado para gerar string.
$listaUnificada = implode(", ", $listaNomes);

echo $listaUnificada . PHP_EOL;

echo PHP_EOL;
//--------------------------------------------
//treinando:
/*
 *Recebemos a seguinte lista de e-mails:
 *ana@empresa.com.br;junior@empresa.com.br;maria@empresa.com.br
 *Precisamos fazer um programa que vai enviar uma mensagem para cada um desses emails,
 * mas primeiro, precisamos criar um array e armazenar cada e-mail desses em uma posição
 * do array. Como podemos fazer isso?
*/

$listaEmails = "ana@empresa.com.br;junior@empresa.com.br;maria@empresa.com.br";
$listaEmails = explode(";", $listaEmails);

foreach($listaEmails as $email){
    echo "Email: $email".PHP_EOL;
}



