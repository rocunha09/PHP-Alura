<?php
namespace Alura\Cursos\Controller;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * $var \Dctrine\ORM\EntityManagerInterface
     */
    private $entitymanager;

    public function __construct()
    {
        $this->entitymanager = new EntityManagerCreator()->getEntityManager();

    }
    public function processaRequisicao(): void
    {
        $curso = $_POST['descricao'];
    }
}