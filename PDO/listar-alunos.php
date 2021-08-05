<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$statement = $pdo->query('SELECT * FROM students;');

/*
 * outra forma de realizar a busca de listagem é realizando um fech e tratando item por item
 * assim se a lista tiver milhares de itens, não irá sobrecarregar a memória...
 * veja como ficaria logo abaixo:
 *
 * obs.: caso queria buscar apenas 1 basta passar o id, caso busque uma lista, ela
 * estará passando pelo while...
 *
 * obs2.: caso seja preciso apenas 1 dado por exemplo, não seria necesário faazer um fetch
 * ou um fetchAll, bastaria realizarmos um fetchClumn e assim ocupando a memória com menos dados
 * do que antes.
 * 
 */
/*
while($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birthdate'])
    );

    echo $student->age() . PHP_EOL;
}
*/

//abaixo realizando a busca da lista por fechAll

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

