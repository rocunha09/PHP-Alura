<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$id = 1;

$statement = $pdo->query('SELECT * FROM students WHERE id = '. $id .';');

$studetnDataList = $statement->fetch(PDO::FETCH_ASSOC);

print_r($studetnDataList);

