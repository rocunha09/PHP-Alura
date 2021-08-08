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

        //com errmode_exception setado, se houver algum erro de conexão, query, ou algo semelhate
        //o PDO irá monitorar e retornar.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}