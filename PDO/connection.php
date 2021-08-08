<?php

$dbPath = __DIR__.'/banco.sqlite';
$pdo = new PDO(
    'sqlite:'.$dbPath
);
echo 'conectei'.PHP_EOL;


//$pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES('21', '1234-45678', 2), ('21', '8754-4321', 2);");
exit();

$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY,
        name TEXT,
        birthdate TEXT);
        
        
    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );
';

$pdo->exec($createTableSql);