<?php


namespace Alura\Cursos\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function handle(ServerRequestInterface $request):ResponseInterface
    {
        //substituiindo o uso direto de $_GET e $_POST devido a nova implementação [psr-7]
        $get = $request->getQueryParams();
        $post = $request->getparsedBody();

        $html = 'Teste';
        return new Response(200,[],$html);
    }
}