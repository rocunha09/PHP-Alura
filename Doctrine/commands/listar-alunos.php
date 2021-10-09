<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//esta é a primeira forma de realizar consulta, substituída pela dql abaixo
/*
$alunosRepository = $entityManager->getRepository(Aluno::class);

//buscando e listando todos os alunos
$alunos = $alunosRepository->findAll();
*/

//conhecendo uma DQL[doctrine query language] para consultas aprimoradas
//pode-se observar que não é um SQL comum, está sendo utilizado as entidades e suas características para realizar a busca
//e para usar esta forma não é preciso realizar getRepository para o findAll() pois não será utilizado
$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno";

//pode-se ainda realizar consultas mais específicas:
//$dqlSufixo = " WHERE aluno.id = 1 OR aluno.nome = 'Rafael Cunha'";

$query =  $entityManager->createQuery($dql /* . $dqlSufixo*/);
$alunos = $query->getResult();

foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })->toArray();

    echo "\nid: {$aluno->getId()} \nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones) . "\n";


}

