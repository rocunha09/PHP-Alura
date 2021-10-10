<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class ListarCursos extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos= $entityManager->getRepository(Curso::class); 
    }

    public function processaRequisicao(): void
    {

        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            "titulo" => "Listar Cursos",
            "cursos" => $this->repositorioDeCursos->findAll()
        ]);

    }
}