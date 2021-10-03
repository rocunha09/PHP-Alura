<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];

/*
*como estamos buscando apenas 1 registro não é necessário buscar um repositório inteiro, 
*podemos através do entity manager passar a classe como parâmetro do find
*/

//busca antes
$aluno = $entityManager->find(Aluno::class, $id);
print_r($aluno);

$aluno->setNome($novoNome);
$entityManager->flush();

//busca depois 
$aluno = $entityManager->find(Aluno::class, $id);
print_r($aluno);