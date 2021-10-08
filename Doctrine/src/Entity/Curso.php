<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 *
 */
class Curso
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     *  @Column(type="string")
     */
    private $nome;

    /*
     * Como criamos uma relação bidirecional, ou seja, ambos os lados conseguem se
     * comunicar, o Doctrine pede que nós informemos qual dos dois lados
     * é o lado dono (owner) e qual o lado inverso (inversed) da relação, para saber
     *  como criar a tabela no banco de dados.
     *
     * No nosso caso, as entidades são independentes, então não há lado inverso deste
     * relacionamento. Por isso, onde colocar o inversedBy e o mappedBy não traz grande
     * diferença. Inverter estes dois faria apenas com que o nome da tabela de relação
     * no banco de dados fosse alterada.
     */

    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(Int $id)
    {
        $this->id = $id;
        return $this;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addAlunos(Aluno $aluno)
    {
        if($this->alunos->contains($aluno)){
            return $this;
        }

        $this->alunos->add($aluno);
        $aluno->addCurso($this);
        return $this;
    }

    public function getAlunos(): Collection
    {
        return $this->alunos;
    }


}