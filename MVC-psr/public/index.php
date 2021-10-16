<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

$rotas = require __DIR__ . '/../config/routes.php';
$caminho = $_SERVER["PATH_INFO"] ?? '/';

//para o script se não receber uma rota válida
if(!array_key_exists($caminho, $rotas)){
    //aqui pode-se ter uma página personalizada 404, com um controllador próprio e view
    //usando http para uma reposta padrão de 404
    http_response_code(404);
    exit();
}

//qualquer controlador irá lidar com a sessão iniciada.
//session_start();
//
////redireciona caso não esteja logado ou se a rota que esta tentando acessar é diferente de login
//if(!isset($_SESSION['logado']) && stripos($caminho, 'login') === false){
//    header('Location: /login');
//    exit();
//}


//aqui está sendo usado um módulo que cria as mensagens, implementando a interface
//fornecida pela psr-7 aplicada na InterfaceControladorRequisicao
$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

//caso receba uma rota válida:
$controllerClass = $rotas[$caminho];
$controller = new $controllerClass();
$resposta = $controller->processaRequisicao($request);


//viasualizado os cabeçalhos da resposta
foreach ($resposta->getHeaders() as $name =>$values){
    foreach ($values as $value){
        header(sprintf('%s : %s', $name, $value), false);
    }
}

echo $resposta->getBody();
exit();