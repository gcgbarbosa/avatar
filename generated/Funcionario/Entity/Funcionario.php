<?php

namespace Funcionario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario")
 * @ORM\Entity
 */
class Funcionario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFuncionario", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeFuncionario", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomefuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="emailFuncionario", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $emailfuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneFuncionario", type="string", length=15, precision=0, scale=0, nullable=false, unique=false)
     */
    private $telefonefuncionario;


    /**
     * Get idfuncionario
     *
     * @return integer 
     */
    public function getIdfuncionario()
    {
        return $this->idfuncionario;
    }

    /**
     * Set nomefuncionario
     *
     * @param string $nomefuncionario
     * @return Funcionario
     */
    public function setNomefuncionario($nomefuncionario)
    {
        $this->nomefuncionario = $nomefuncionario;
    
        return $this;
    }

    /**
     * Get nomefuncionario
     *
     * @return string 
     */
    public function getNomefuncionario()
    {
        return $this->nomefuncionario;
    }

    /**
     * Set emailfuncionario
     *
     * @param string $emailfuncionario
     * @return Funcionario
     */
    public function setEmailfuncionario($emailfuncionario)
    {
        $this->emailfuncionario = $emailfuncionario;
    
        return $this;
    }

    /**
     * Get emailfuncionario
     *
     * @return string 
     */
    public function getEmailfuncionario()
    {
        return $this->emailfuncionario;
    }

    /**
     * Set telefonefuncionario
     *
     * @param string $telefonefuncionario
     * @return Funcionario
     */
    public function setTelefonefuncionario($telefonefuncionario)
    {
        $this->telefonefuncionario = $telefonefuncionario;
    
        return $this;
    }

    /**
     * Get telefonefuncionario
     *
     * @return string 
     */
    public function getTelefonefuncionario()
    {
        return $this->telefonefuncionario;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $datanasc;


    /**
     * Set datanasc
     *
     * @param \DateTime $datanasc
     * @return Funcionario
     */
    public function setDatanasc($datanasc)
    {
        $this->datanasc = $datanasc;
    
        return $this;
    }

    /**
     * Get datanasc
     *
     * @return \DateTime 
     */
    public function getDatanasc()
    {
        return $this->datanasc;
    }
}