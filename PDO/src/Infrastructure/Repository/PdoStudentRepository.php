<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Repository\StudentRepository;
use Alura\Pdo\Infrastructure\persistence\ConnectionCreator;
use PDO;
use Alura\Pdo\Domain\Model\Student;
use DateTimeImmutable;

class PdoStudentRepository implements StudentRepository
{
    private \PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $sqlAll = 'SELECT * FROM students;';
        $statement = $this->connection->query($sqlAll);

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

        //criado hydrateStudentList
        //abaixo realizando a busca da lista por fechAll
        /*
        $studetnDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach($studetnDataList as $studentData){
                $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birthdate'])
            );
        }

        return $studentList;
        */
        return $this->hydrateStudentList($statement);
    }

    public function studentsBirthAt(\DateTimeInterface $birthdate): array
    {
        $sqlBirthAt= 'SELECT * FROM students WHERE birthdate = ?;';
        
        $statement = $this->connection->prepare($sqlBirthAt);
        $statement->bindValue(1, $birthdate->format('Y-m-d'));
        $statement->execute();

        //criado hydrateStudentlist
        /*
        $studetnDataList = $statement->fetch(PDO::FETCH_ASSOC);
        return $studetnDataList;
        */

        return $this->hydrateStudentList($statement);
    }

    public function hydrateStudentList(\PDOStatement $statement): array
    {
        $studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach($studentDataList as $studentData){
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new DateTimeImmutable($studentData['birthdate'])

            );
        }

        return $studentList;
    }

    public function save(Student $student): bool
    {
        //$student = new Student(null, 'Joana', new \DateTimeImmutable('1993-04-04'));

        if($student->id() === null){
            return $this->insertStudent($student);
        }

        return $this->updateStudent($student);
    }
    
    public function insertStudent(Student $student): bool
    {
        $sqlInsert = "INSERT INTO students(name, birthdate) VALUES(?, ?);";

        $statement = $this->connection->prepare($sqlInsert);

        $statement->bindValue(1, $student->name());
        $statement->bindValue(2, $student->birthdate()->format('Y-m-d'));

        return $statement->execute();

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
        
    }

    public function updateStudent(Student $student): bool
    {
        $sqlUpdate = "UPDATE students SET name = ?, birthdate = ? WHERE id = ?";

        $statement = $this->connection->prepare($sqlUpdate);
        $statement->bindValue(1, $student->name());
        $statement->bindValue(2, $student->birthdate()->format('Y-m-d'));
        $statement->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $statement->execute();

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
        
    }

    public function remove(Student $student): bool
    {

        $sqlDelete = 'DELETE FROM students WHERE id = ?;';

        $preparedStatement = $this->connection->prepare($sqlDelete);
        $preparedStatement->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $preparedStatement->execute();

    }

    public function studentIdAt(int $id): Array
    {
        $sqlIdAt = 'SELECT * FROM students WHERE id = ?;';

        $statement = $this->connection->prepare($$sqlIdAt);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $studetnDataList = $statement->fetch(PDO::FETCH_ASSOC);

        return $studetnDataList;
    }

}