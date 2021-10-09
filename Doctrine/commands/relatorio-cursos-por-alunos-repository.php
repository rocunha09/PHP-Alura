<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__. '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);

//verifica-se quantas e quais querys estão sendo executadas:
$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

//usando dql
//$listaAlunos = $alunosRepository->buscarCursosPorAluno();

//usando queryBuilder
$listaAlunos = $alunosRepository->buscarCursosPorAlunoQueryBuilder();


//primeira forma de realizar a busca e listar todos alunos com cursos e telefones
echo "\n\tID:\tNOME:\t\t\tCURSOS:\t\t\tTELEFONES:";
foreach($listaAlunos as $aluno){
    $telefones = $aluno->getTelefones()->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();

    $cursos = $aluno->getCursos()->map(function(Curso $curso){
        return $curso->getNome();
    })->toArray();

    echo "\n\t{$aluno->getId()}\t{$aluno->getNome()}\t\t\t". implode(", ",$cursos) . "\t\t\t". implode(", ",$telefones);
}

//mostrando cada query que está sendo executada
echo "\n";
foreach($debugStack->queries as $queryInfo){
    echo $queryInfo['sql'] . "\n";
}