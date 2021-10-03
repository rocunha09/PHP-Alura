<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

/*
*OBS:
*como estamos buscando apenas 1 registro não é necessário buscar um repositório inteiro, 
*podemos através do entity manager passar a classe como parâmetro do find [ver o script: atualizar-aluno.php]
*/

//buscando aluno pelo seu Id
$aluno = $alunoRepository->find(4);
//echo "{$aluno->getId()} - {$aluno->getNome()}\n";

//buscando através de um valor específico.
//usando findby ele retorna uma lista de ocorrências, mas para apenas 1 registro pode-se usar findoneBy
$aluno = $alunoRepository->findBy([
    "nome" => "Bill Gates"
]);
//print_r($aluno);

//findoneBy
$aluno = $alunoRepository->findOneBy([
    "nome" => "Bill Gates"
]);
print_r($aluno);
