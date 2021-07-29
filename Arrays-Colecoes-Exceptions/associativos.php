<?php
require_once 'src/autoload.php';

use Arrays\Service\ArrayUtils;

//array diff = verfica a diferença entre dois arrays e devolve um novo array.
$correntistas = [
  'Giovani',
  'João',
  'Maria',
  'Luiz',
  'Luiza',
  'Rafael'
];

$correntistasNaoPagantes = [
  'Luiz',
  'Luiza',
  'Rafael'
];

$correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);
print_r($correntistasPagantes);

//unificando arrays para associar o correntista com saldo

//como podemos ver, realizar a operação com merge não resolve, pois ela apenas tranformaria
//duas listas em uma, e o que queremos é combinear as duas, ou seja, usaremos o array_combine

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

$correntistasESaldos = array_merge($correntistas, $saldos);
print_r($correntistasESaldos);

//como podemos ver foi criado um array onde as posições são associativas entre nome e saldo...
$correntistasESaldos = array_combine($correntistas, $saldos);
print_r($correntistasESaldos) . PHP_EOL;

//exibindo um valor no array associativo
//print_r($correntistasESaldos['Maria']) . PHP_EOL;

//incluindo mais um correntista:
$correntistasESaldos["Rafael"] = 4500;

//operacoes com arrays associativos
$chaveProcurada = "João";

if(array_key_exists($chaveProcurada, $correntistasESaldos)){
    echo "O saldo do $chaveProcurada é: $correntistasESaldos[$chaveProcurada]" . PHP_EOL;

} else {
    echo "Correntista não encontrado..." . PHP_EOL;
}

//iterando sobre array associativo
print_r(ArrayUtils::encontrarCorrentistasMaiorSaldo(4000, $correntistasESaldos));

