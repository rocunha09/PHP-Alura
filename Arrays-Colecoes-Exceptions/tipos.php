<?php
require_once 'ArrayUtils.php';
//removendo elemento do array
//tratando retorno nulo do array search

//aplicando chegagem de tipos com tipos estritos no array_search()
//tipos estritos podem ser usados no inicio do documento com: declare(strict_types=1);
//neste caso realizei apenas na função array_search, mantendo assim sem tipagem o parâmetro do método

$correntistasECompras = [
    "Giovani",
    "João",
    12,
    "Maria",
    25,
    "Luiz",
    "Luiza",
    "12"
];

print_r($correntistasECompras);

if(ArrayUtils::remover('12', $correntistasECompras) !== false){
    print_r($correntistasECompras);

} else {
    echo 'elemento não encontrado' . PHP_EOL;
}


