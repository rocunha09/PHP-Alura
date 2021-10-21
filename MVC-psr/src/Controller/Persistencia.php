<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entityManager = $entity;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //pegar dados do formulario
        //montar modelo
        //atualizar/inserir no banco

        $descricao = filter_var($request->getParsedBody()['descricao'], FILTER_SANITIZE_STRING);
        $id = filter_var($request->getQueryParams()['id'],FILTER_VALIDATE_INT);
        $curso = new Curso();
        $curso->setDescricao($descricao);


        if($id !== false && !is_null($id)){
           //atualizar
           $curso->setId($id);
           $this->entityManager->merge($curso);

            $this->defineMensagem('success', 'Curso atualizado com sucesso!');

       } else {
           //inserir
            $this->entityManager->persist($curso);

             $this->defineMensagem('success', 'Curso cadastrado com sucesso!');
       }

        $this->entityManager->flush();

        return new Response(302, ['Location'=>'/listar-cursos']);
    }

}