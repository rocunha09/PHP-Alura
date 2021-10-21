<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class Exclusao implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(302, ['Location' => '/listar-cursos']);

        //pegando id que veio da pagina com o objeto $request
        $queryString = $request->getQueryParams();
        $id = filter_var($queryString['id'], FILTER_VALIDATE_INT);

        if(is_null($id) ||$id === false){
            $this->defineMensagem('danger', 'Curso inexistente.');
            return $response;
        }

        $entidade = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($entidade);
        $this->entityManager->flush();

        return $response;
    }


}