<?php

namespace Professor\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity
 */
class Departamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDepartamento", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeDepartamento", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomedepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoDepartamento", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $descricaodepartamento;


    /**
     * Get iddepartamento
     *
     * @return integer 
     */
    public function getIddepartamento()
    {
        return $this->iddepartamento;
    }

    /**
     * Set nomedepartamento
     *
     * @param string $nomedepartamento
     * @return Departamento
     */
    public function setNomedepartamento($nomedepartamento)
    {
        $this->nomedepartamento = $nomedepartamento;
    
        return $this;
    }

    /**
     * Get nomedepartamento
     *
     * @return string 
     */
    public function getNomedepartamento()
    {
        return $this->nomedepartamento;
    }

    /**
     * Set descricaodepartamento
     *
     * @param string $descricaodepartamento
     * @return Departamento
     */
    public function setDescricaodepartamento($descricaodepartamento)
    {
        $this->descricaodepartamento = $descricaodepartamento;
    
        return $this;
    }

    /**
     * Get descricaodepartamento
     *
     * @return string 
     */
    public function getDescricaodepartamento()
    {
        return $this->descricaodepartamento;
    }
}