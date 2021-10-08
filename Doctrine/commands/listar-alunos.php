<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);

//buscando e listando todos os alunos
/**
 * @var Aluno[] $alunos
 */
$alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();

    echo "id: {$aluno->getId()} \nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones);


}

