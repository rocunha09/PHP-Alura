<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

/*
*como estamos buscando apenas 1 registro não é necessário buscar um repositório inteiro, 
*podemos através do entity manager passar a classe como parâmetro do find
*/

//busca antes e então pode-se realizar algum tratamento caso o aluno não exista... para então executar a remoção
/*
$aluno = $entityManager->find(Aluno::class, $id);

if (is_null($aluno)) {
    echo "Aluno inexistente";

} else {
    print_r($aluno);

}
*/

//porém desta forma realiza-se 2 querys no banco, podemos fazer diferente usando a referância da entidade mapeada
$aluno = $entityManager->getReference(Aluno::class, $id);

$entityManager->remove($aluno);
$entityManager->flush();