<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

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

//usando arquivo de config para criar um container que irá retornar a instancia de um controller
$container = require __DIR__ . '/../config/dependencies.php';
$controller = $container->get($controllerClass);
$resposta = $controller->handle($request);


//viasualizado os cabeçalhos da resposta
foreach ($resposta->getHeaders() as $name =>$values){
    foreach ($values as $value){
        header(sprintf('%s : %s', $name, $value), false);
    }
}

echo $resposta->getBody();


/*
    implementado InterfaceControladorRequisição através da psr-7, substituindo a criada anteriormente.
    implementado a criação de mensagens http a partir da interface psr-7 utilizando a psr17.
    implementando a psr-15 ajustando a forma de como lidar com as mensagens http através do RequestHandlerInterface, e o método Handle substituindo o original processaRequisição... 
    implementado psr-11 para container de dependência, pois um Controller pode receber no seu construtor uma dependência para seu funcionamento mas outro pode receber outro tipo, a psr-11 ajuda a realizar dinamicamente a checagem e uso.
    implementado php-di para realizar uso da psr-11 descrito acima.
    */    