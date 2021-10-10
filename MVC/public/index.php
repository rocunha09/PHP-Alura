<?php
//este arquivo no ponto atual de desenvolvimento pode ser chamado de front controller ou dispacher
//ver: https://i.stack.imgur.com/Beh3a.png
require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;


if(!empty($_SERVER["PATH_INFO"])){
   
    switch ($_SERVER["PATH_INFO"]) {
        case '/listar-cursos':
            $controller = new ListarCursos();
            $controller->processaRequisicao();
            break;
    
        case '/novo-curso':
            $controller = new FormularioInsercao();
            $controller->processaRequisicao();
            break;

        case '/salvar-curso':
            $controller = new Persistencia();
            $controller->processaRequisicao();
            break;
        
        default:
            echo "<h1>404 - page Not Found</h1>";
            break;
    }

} else {
    echo "<h1>404 - page Not Found</h1>";
}


