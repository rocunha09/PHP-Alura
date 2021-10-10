<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class FormularioEdicao implements InterfaceControladorRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao():void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if ($id === false || is_null($id)){
            header('Location: /listar-cursos');
            return;
        }

        $curso = $this->entityManager->find(Curso::class, $id);

        $titulo = "Editar Curso";
        require_once __DIR__ . '/../../view/cursos/formulario.php';
    }
}