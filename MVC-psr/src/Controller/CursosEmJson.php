<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CursosEmJson implements \Psr\Http\Server\RequestHandlerInterface
{

    private $repostorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $lista = $this->repositorioDeCursos->findAll();

        return new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($lista));
    }
}