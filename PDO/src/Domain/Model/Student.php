<?php

namespace Alura\Pdo\Domain\Model;

class Student
{
    private ?int $id;
    private string $name;
    private \DateTimeInterface $birthdate;

    public function __construct(?int $id, string $name, \DateTimeInterface $birthdate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }

    public function birthdate(): \DateTimeInterface
    {
        return $this->birthdate;
    }

    public function age(): int
    {
        return $this->birthdate
            ->diff(new \DateTimeImmutable())
            ->y;
    }
}
