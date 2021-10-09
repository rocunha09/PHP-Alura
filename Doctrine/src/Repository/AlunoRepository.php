<?php


namespace Alura\Doctrine\Repository;


use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public  function buscarCursosPorAluno()
    {
        $entityManager = $this->getEntityManager();
        //usando dql para realizar a busca, o fetch em aluno é eager, portanto será tratado o join com cursos
        //desta forma reduzimos a consulta para apenas uma query
        $classeAluno = Aluno::class;
        $dql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";

        $query =  $entityManager->createQuery($dql);
        return $query->getResult();
    }

    public function buscarCursosPorAlunoQueryBuilder()
    {
        $query = $this->createQueryBuilder('aluno')
            ->join('aluno.telefones', 't')
            ->join('aluno.cursos', 'c')
            ->addSelect('t')
            ->addSelect('c')
            ->getQuery();

        return $query->getResult();
    }

}