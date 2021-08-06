<?php

namespace Alura\Pdo\Infrastructure\persistence;
use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dbPath = __DIR__.'/../../../banco.sqlite';
        
        $pdo = new PDO(
            'sqlite:'.$dbPath
        );

        return $pdo;
    }
}