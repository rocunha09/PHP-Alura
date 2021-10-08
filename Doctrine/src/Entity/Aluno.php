<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @Entity
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
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
     */
    private $telefones;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
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
}