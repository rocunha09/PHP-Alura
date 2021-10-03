<?php

namespace Alura\Doctrine\Entity;

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
}