<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$aluno = new Aluno();

//$aluno->setNome('Rafael Cunha');

//recebendo aluno pela linha de comando para facilitar o teste:
$aluno->setnome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($aluno);
$entityManager->flush();