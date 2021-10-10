<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        //pegar dados do formulario
        //montar modelo
        //inserir no banco

        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        //o header funciona apenas com o location, mas pode receber outros parâmetros
        //neste caso: o true indica que o php vai substituir qualquer coisa que tiver no Location, caso contrário deve-se passar false.
        //o último parâmetro passado foi 302 indicando redirecionamento, um status de resposta mostrando o qeu aconteceu naquela requisição.
        header('Location: /listar-cursos', true, 302);
    }
}