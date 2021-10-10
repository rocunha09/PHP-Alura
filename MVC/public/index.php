<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$rotas = require __DIR__ . '/../config/routes.php';
$caminho = $_SERVER["PATH_INFO"] ?? '/';

//para o script se não receber uma rota válida
if(!array_key_exists($caminho, $rotas)){
    //aqui pode-se ter uma página personalizada 404, com um controllador próprio e view
    //usando http para uma reposta padrão de 404
    http_response_code(404);
    exit();
}

//caso receba uma rota válida:
$controllerClass = $rotas[$caminho];
$controller = new $controllerClass();
$controller->processaRequisicao();