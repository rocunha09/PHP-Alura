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
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $dir . '/var/data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }

}