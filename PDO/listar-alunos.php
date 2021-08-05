<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$statement = $pdo->query('SELECT * FROM students;');

$studetnDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach($studetnDataList as $studentData){
        $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birthdate'])
    );
}

print_r($studentList);

