<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$student = new Student(null, 'Joana', new \DateTimeImmutable('1993-04-04'));


$sqlInsert = "INSERT INTO students(name, birthdate) VALUES(?, ?);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if($statement->execute()){
    echo "Aluno Incluído";

} else {
    echo "Falha ao incluir Aluno";
}

/*
 * também podemos trabalhar com parâmetros nomeados no lugar de ?, poderia ser
 * por exemplo: :name, :birthdate e no bindValue trocar o 1 e 2 pelo mesmo parâmetro.
 *
 * também podemos usar bindParam, no lugar de bindValue
 * bindParam passaria o valor por referência, enquanto o
 * bindValue passa o valor por passagem de valor, chamando um método no bindValue(parece ser mais
 * seguro.
 *
 * o bndParam pode ser mais util quando for chamar um store procedure ou function no banco de dados
 * que tenha parâmetro de saída, assim passamos também uma variável para esse parâmetro de saída ser
 * armazenado.
 *
 */