<?php

//arquivp que faz o boostrap do projeto
//require_once 'boostrap.php';

require_once __DIR__ .'/vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

//arquivo que pega o Entitymanager na aplicação
//$entityManager = GetEntityManager();

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return consoleRunner::createHelperSet($entityManager);
