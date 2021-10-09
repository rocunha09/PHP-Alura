<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


//na notação de entidade foi incluso repositoryClass, para referenciar para o doctrine
//que ele deve usar a classe AlunoRepository como referência (ver relatorio-cursos-por-aluno-repository.php)
/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\AlunoRepository")
 */
class Aluno
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $nome;

    //o padrão da busca do doctrine é lazy, mas pode-se usar eager na notação de fetch para otimizar a buscar e sempre trazer tudo
    //desta forma reduz a quantidade de select no banco melhorando a performace
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getId():int
    {
		return $this->id;
	}

	public function getNome():string
    {
		return $this->nome;
	}

	public function setNome(string $nome):self
    {
		$this->nome = $nome;
        return $this;
	}

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso): self
    {
        if($this->cursos->contains($curso)){
            return $this;
        }

        $this->cursos->add($curso);
        $curso->addAlunos($this);
        return $this;
    }

    public function getCursos(): Collection
    {
        return $this->cursos;
    }
}