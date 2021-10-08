<?php


namespace Alura\Doctrine\Entity;

/**
 *
 * @Entity
 */
class Telefone
{
    /**
     * @Id
     *@Column(type="integer")
     *@GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $numero;

    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(Int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}