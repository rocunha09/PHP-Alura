<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{


    function getEntityManager(): EntityManagerInterface
    {
        $dir = __DIR__ . '/../..';
        $config = Setup::createAnnotationmetadataConfiguration([$dir . '/src'], true);

        //sqlite
        /*
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $dir . '/var/data/banco.sqlite'
        ];
        */

        //usar vendor\bin\doctrine orm:schema-tool:create e ele criará
        //o esquema para operar através do mysql
        $connection = [
          'driver' => 'pdo_mysql',
          'host' =>   'localhost',
            'dbname' => 'curso_doctrine',
            'user' => 'root',
            'senha' => ''
        ];

        return EntityManager::create($connection, $config);
    }

}