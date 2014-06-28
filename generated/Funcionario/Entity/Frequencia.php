<?php

namespace Funcionario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia")
 * @ORM\Entity
 */
class Frequencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFrequencia", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfrequencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horarioEntrada", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $horarioentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horarioSaida", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $horariosaida;

    /**
     * @var \Funcionario\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario", nullable=true)
     * })
     */
    private $funcionariofuncionario;


    /**
     * Get idfrequencia
     *
     * @return integer 
     */
    public function getIdfrequencia()
    {
        return $this->idfrequencia;
    }

    /**
     * Set horarioentrada
     *
     * @param \DateTime $horarioentrada
     * @return Frequencia
     */
    public function setHorarioentrada($horarioentrada)
    {
        $this->horarioentrada = $horarioentrada;
    
        return $this;
    }

    /**
     * Get horarioentrada
     *
     * @return \DateTime 
     */
    public function getHorarioentrada()
    {
        return $this->horarioentrada;
    }

    /**
     * Set horariosaida
     *
     * @param \DateTime $horariosaida
     * @return Frequencia
     */
    public function setHorariosaida($horariosaida)
    {
        $this->horariosaida = $horariosaida;
    
        return $this;
    }

    /**
     * Get horariosaida
     *
     * @return \DateTime 
     */
    public function getHorariosaida()
    {
        return $this->horariosaida;
    }

    /**
     * Set funcionariofuncionario
     *
     * @param \Funcionario\Entity\Funcionario $funcionariofuncionario
     * @return Frequencia
     */
    public function setFuncionariofuncionario(\Funcionario\Entity\Funcionario $funcionariofuncionario = null)
    {
        $this->funcionariofuncionario = $funcionariofuncionario;
    
        return $this;
    }

    /**
     * Get funcionariofuncionario
     *
     * @return \Funcionario\Entity\Funcionario 
     */
    public function getFuncionariofuncionario()
    {
        return $this->funcionariofuncionario;
    }
}
