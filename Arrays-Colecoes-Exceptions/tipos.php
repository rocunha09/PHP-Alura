<?php
//declare(strict_types=1);
namespace Service;

require_once 'src/autoload.php';

spl_autoload_register(
    function(string $namespaceClasse):void
    {
        $caminho = "/src";
        $diretorioClasse = str_replace("\\", DIRECTORY_SEPARATOR, $namespaceClasse);
        include_once getcwd() . $caminho . DIRECTORY_SEPARATOR . "{$diretorioClasse}.php";
    }
);

use Arrays\Service\ArrayUtils;


//removendo elemento do array
//tratando retorno nulo do array search

//aplicando chegagem de tipos com tipos estritos no array_search()
//tipos estritos podem ser usados no inicio do documento com: declare(strict_types=1);
//neste caso realizei apenas na função array_search, mantendo assim sem tipagem o parâmetro do método


// imagine que haveria a necessidade de importar outras classes como a classe calculadora por exemplo, seria uma grande lista de declarações
//portanto pode-se realizar o autoload, realizado neste arquivo afins de prática...

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


