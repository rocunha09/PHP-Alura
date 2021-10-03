<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);

//buscando e listando todos os alunos
$alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()}\n";
}