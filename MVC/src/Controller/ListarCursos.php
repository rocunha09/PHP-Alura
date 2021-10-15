<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class ListarCursos implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos= $entityManager->getRepository(Curso::class); 
    }

    public function processaRequisicao(): void
    {

        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            "titulo" => "Lista de Cursos",
            "cursos" => $this->repositorioDeCursos->findAll()
        ]);

    }
}