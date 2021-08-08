<?php

use Alura\Pdo\Infrastructure\persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';


$pdo = ConnectionCreator::createConnection(); 

$repository = new PdoStudentRepository($pdo); //injeção de dependência para deixar PdoStudentRepository mais independente

//$list = $repository->allStudents();

//print_r($list);

//criando uma turma, gravando no banco vários alunos, porém se um deles der errado, os outros devem ser apagados
//para isso podemos usar trasações...

try{
$pdo->beginTransaction(); //criando transação

$aStudent = new Student(null, 'Nico Steppat', new DateTimeImmutable('1992-01-02'));
$repository->save($aStudent);

$anotherStudent = new Student(null, 'joaquim Silva', new DateTimeImmutable('1990-01-02'));
$repository->save($anotherStudent);

$pdo->commit(); //executando transação
}catch(\PDOException $e) {
    echo $e->getMessage();
//utilizado quando há erros durante a transação, e assim não completa o envio par ao banco, e desfaz o que ja tiver sido feito...
$pdo->rollBack();
}

