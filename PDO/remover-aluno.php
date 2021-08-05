<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Model\Student;

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);

$id = 3;

$sqlDelete = 'DELETE FROM students WHERE id = ?;';
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, $id, PDO::PARAM_INT);

if($preparedStatement->execute()){
    echo 'Aluno deletado com sucesso.';

} else {
    echo 'Falha ao deletar Aluno';
}
