<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno();

//recebendo aluno pela linha de comando para facilitar o teste:
$aluno->setNome($argv[1]);
$entityManager->persist($aluno);

//pegando os telefones pela linha de comando
for ($i = 2; $i < $argc; $i++){
    $numeroTelefone = $argv[$i];

    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);

    $aluno->addTelefone($telefone);

    //com a anotação(em aluno) para o Doctrine usar cascade logo este persist não é necessário.
    $entityManager->persist($telefone);

}

$entityManager->flush();