<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$student = new Student(null, 'Joao', new \DateTimeImmutable('1991-02-02'));


$sqlInsert = "INSERT INTO students(name, birthdate) 
            VALUES('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

var_dump($pdo->exec($sqlInsert));