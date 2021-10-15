<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class Exclusao implements InterfaceControladorRequisicao
{
    //usando trait para reaproveitamento de código.
    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        return;
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if($id === false || is_null($id)){
            $this->defineMensagem('danger', 'Curso inexistente!');

            header('Location: /listar-cursos', true, 302);

        }

        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        $this->defineMensagem('success', 'Curso excluído com sucesso!');

        header('Location: /listar-cursos', true, 302);

    }


    /*
        a aplicação pode falhar devido ao doctrine tentar cirar classes auxiliares para realizar a função
        de exclusão na aplicação, ocorrerá um erro de proxy
        para resolver basta rodar:
        vendor/bin/doctrine.bat  orm:generate-proxies
    
    */
}