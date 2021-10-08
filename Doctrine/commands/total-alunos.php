<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;


//vamos buscar apenas o total de alunos guardados no banco.

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//desta forma pode-se ter o total, mas foi realiza uma consulta cheia de informações
//desnecessárias, para depois realizar o count
/*
$repository = $entityManager->getRepository(Aluno::class);
$alunoList = $repository->findAll();

echo "Total de alunos: " . count($alunoList);
*/

//usando dql pode-se otimizar o processo.
$classAluno = Aluno::class;
$dql = "SELECT COUNT(aluno) FROM $classAluno aluno";

//apenas um número é um dado escalar, logo pode-se usar retorno escalar, e neste caso
//é apenas um dado, o total de alunos, daí o uso do SingleScalarResult
$query = $entityManager->createQuery($dql)->getSingleScalarResult();

echo "Total de alunos count otimizado: " . $query;

