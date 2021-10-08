<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

//busca o curso e aluno no banco
$curso = $entityManager->find(Curso::class, $idCurso);
$aluno = $entityManager->find(Aluno::class, $idAluno);

//aqui pode ser feito aluno add curso ou curso add aluno, tanto faz, pois o relacionamento
//está sendo mapeado e amboms possuem o teste para saber se ja foi incluso ou não

$aluno->addCurso($curso);

$entityManager->flush();