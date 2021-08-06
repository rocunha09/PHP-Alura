<?php

use Alura\Pdo\Infrastructure\persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';


$pdo = ConnectionCreator::createConnection(); 

$repository = new PdoStudentRepository($pdo); //injeção de dependência para deixar PdoStudentRepository mais independente

$list = $repository->allStudents();

print_r($list);