<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait, FlashMessageTrait;

    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(302, ['Location' => '/listar-cursos']);

        $id = filter_var($request->getQueryParams()['id'],FILTER_VALIDATE_INT);

        if ($id === false || is_null($id)){
            $this->defineMensagem('danger', 'ID de curso inválido.');
            return $response;
        }

        $curso = $this->repositorioDeCursos->find($id);

        $html =  $this->renderizaHtml('cursos/formulario.php', [
            "curso" => $curso,
            "titulo" => "Editar Curso"
        ]);

        return new Response(200, [],$html);
    }
}