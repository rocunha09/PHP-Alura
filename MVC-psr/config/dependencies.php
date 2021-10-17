<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManagerInterface::class => function(){ 
        return (new EntityManagerCreator())->getEntityManager();
    }
]);

return $containerBuilder->build();


/*
    Neste arquivo de config para dependencies são criadas as definições que cada controller precisa para
    funcionar, desta forma ele funciona como uma "fabrica" listando as definições de cada controoller e retornando a sua construção
    que por sua vez será usada no arquivo index.

    com isso caso exista a necessidade de um construtor para cada classe para usar uma dependencia, sendo injetada como parâmetro para o construtor
    isso será feito dinamicamente a partir da definição adicionada.
*/