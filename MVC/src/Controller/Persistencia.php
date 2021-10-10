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
        ///atualizar/inserir no banco
        
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        $curso = new Curso();
        $curso->setDescricao($descricao);
        
        if($id !== false && !is_null($id)){
            //atualizar
            $curso->setId($id);
            //Após chamar o método merge passando uma instância de um objeto mapeado como entidade, 
            //o Doctrine passa a enxergá-lo como se ele tivesse sido buscado do banco. Logo, as alterações 
            //nele poderão ser enviadas para o banco.
            $this->entityManager->merge($curso);
            
        } else {
            //inserir
            $this->entityManager->persist($curso);
        }

        $this->entityManager->flush();


        //o header funciona apenas com o location, mas pode receber outros parâmetros
        //neste caso: o true indica que o php vai substituir qualquer coisa que tiver no Location, caso contrário deve-se passar false.
        //o último parâmetro passado foi 302 indicando redirecionamento, um status de resposta mostrando o qeu aconteceu naquela requisição.
        header('Location: /listar-cursos', true, 302);
    }
}