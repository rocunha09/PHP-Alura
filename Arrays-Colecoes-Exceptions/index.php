<?php
//lista de notas de matérias, lançando manualmente cada nota, e calculandoa  média.
/*
$notaDePortuguês = 9;
$notaDeMatematica = 3;
$notaDeGeografia = 10;
$notaDeHistória = 5;
$notaDeQuimica = 10;
$media = ($notaDePortuguês + $notaDeMatematica + $notaDeGeografia + $notaDeHistória + $notaDeQuimica)/5;

echo "A nota de português é: $notaDePortuguês <br>";
echo "A nota de Matematica é: $notaDeMatematica <br>";
echo "A nota de Geografia é: $notaDeGeografia <br>";
echo "A nota de História é: $notaDeHistória <br>";
echo "A nota de História é: $notaDeQuimica <br><br>";

echo "A média é: $media";
*/

//melhorando o código com uso de array para guardar as notas, mas ainda lançamos manualmente os valores para calcular a média
/*
$notas = [9, 3, 10, 5, 10];
$notaDePortuguês = $notas[0];
$notaDeMatematica = $notas[1];
$notaDeGeografia = $notas[2];
$notaDeHistória = $notas[3];
$notaDeQuimica = $notas[4];
$media = ($notas[0] + $notas[1] + $notas[2] + $notas[3] + $notas[4])/count($notas);

echo "A nota de português é: $notas[0] <br>";
echo "A nota de Matematica é: $notas[1] <br>";
echo "A nota de Geografia é: $notas[2] <br>";
echo "A nota de História é: $notas[3] <br>";
echo "A nota de História é: $notas[4] <br><br>";

echo "A média é: $media";
*/

//simplificando o calculo da média com uso de um loop, porém ainda temos lançamento manual de notas, e impressões na tela, podemos utilizar a mesma estratégia das notas...
/*
$notas = [9, 3, 10, 5, 10];
$quantidadeDeNotas = sizeof($notas);
$soma = 0;

$notaDePortuguês = $notas[0];
$notaDeMatematica = $notas[1];
$notaDeGeografia = $notas[2];
$notaDeHistória = $notas[3];
$notaDeQuimica = $notas[4];

for ($i = 0; $i < $quantidadeDeNotas; $i++){
    $soma += $notas[$i];
}

$media = $soma/$quantidadeDeNotas;

echo "A nota de português é: $notas[0] <br>";
echo "A nota de Matematica é: $notas[1] <br>";
echo "A nota de Geografia é: $notas[2] <br>";
echo "A nota de História é: $notas[3] <br>";
echo "A nota de História é: $notas[4] <br><br>";

echo "A média é: $media";
*/

//agora temos um código mais enxuto que realiza a mesma tarefa de antes, com cálculo e lançamento automáticos; agora vamos separar o cáculo do arquivo principal...
/*
$notas = [9, 3, 10, 5, 10];
$materias = ['Português', 'Matemática', 'geografia', 'História', 'Química'];

$quantidadeDeNotas = sizeof($notas);
$soma = 0;

for ($i = 0; $i < $quantidadeDeNotas; $i++){
    $soma += $notas[$i];
}

$media = $soma/$quantidadeDeNotas;

for ($i = 0; $i < $quantidadeDeNotas; $i++){
    echo "A nota de $materias[$i] é: $notas[$i] <br>";

}

echo "A média é: $media";*/

require_once 'Calculadora.php';
$calculadora = new Calculadora();

$materias = ['Português', 'Matemática', 'geografia', 'História', 'Química'];

$notas = [9, 3, 10, 5, 10];
$quantidadeDeNotas = sizeof($notas);

$media = $calculadora->calcularMedia($notas);

if (!$media){
    echo "Não foi possível calcular média";

} else {
    for ($i = 0; $i < $quantidadeDeNotas; $i++){
        echo "A nota de $materias[$i] é: $notas[$i] <br>";

    }

    echo "A média é: $media";
}

