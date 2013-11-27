<?php

namespace Sala\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * ReservaSala
 *
 * @ORM\Table(name="reserva_sala")
 * @ORM\Entity
 */
class ReservaSala implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idreservaSala", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservasala;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="text", nullable=false)
     */
    private $objetivo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicio", type="datetime", nullable=false)
     */
    private $datainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="datetime", nullable=false)
     */
    private $datafim;

    /**
     * @var \Sala\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sala_idsala", referencedColumnName="idsala")
     * })
     */
    private $salasala;

    /**
     * @var \Professor\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idProfessor", referencedColumnName="idProfessor")
     * })
     */
    private $professorprofessor;

    /**
     * @var \Funcionario\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario")
     * })
     */
    private $funcionariofuncionario;

    /**
     * Get idreservasala
     *
     * @return integer 
     */
    public function getIdreservasala()
    {
        return $this->idreservasala;
    }

     /**
     * Set objetivo
     *
     * @param string $objetivo
     * @return ReservaSala
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    
        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string 
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

     /**
     * Set datainicio
     *
     * @param \DateTime $datainicio
     * @return ReservaSala
     */
    public function setDatainicio($datainicio)
    {
        $this->datainicio = $datainicio;
    
        return $this;
    }

    /**
     * Get datainicio
     *
     * @return \DateTime 
     */
    public function getDatainicio()
    {
        return $this->datainicio;
    }

    /**
     * Set datafim
     *
     * @param \DateTime $datafim
     * @return ReservaSala
     */
    public function setDatafim($datafim)
    {
        $this->datafim = $datafim;
    
        return $this;
    }

    /**
     * Get datafim
     *
     * @return \DateTime
     */
    public function getDatafim()
    {
        return $this->datafim;
    }

    /**
     * Set salasala
     *
     * @param \Sala\Entity\Sala $salasala
     * @return ReservaSala
     */
    public function setSalasala(\Sala\Entity\Sala $salasala = null)
    {
        $this->salasala = $salasala;
    
        return $this;
    }

    /**
     * Get salasala
     *
     * @return \Sala\Entity\Sala 
     */
    public function getSalasala()
    {
        return $this->salasala;
    }

    /**
     * Set professorprofessor
     *
     * @param \Professor\Entity\Professor $professorprofessor
     * @return ReservaSala
     */
    public function setProfessorprofessor(\Professor\Entity\Professor $professorprofessor = null)
    {
        $this->professorprofessor = $professorprofessor;
    
        return $this;
    }

    /**
     * Get professorprofessor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfessorprofessor()
    {
        return $this->professorprofessor;
    }

    /**
     * Set funcionariofuncionario
     *
     * @param \Funcionario\Entity\Funcionario $funcionariofuncionario
     * @return ReservaSala
     */
    public function setFuncionariofuncionario(\Funcionario\Entity\Funcionario $funcionariofuncionario = null)
    {
        $this->funcionariofuncionario = $funcionariofuncionario;
    
        return $this;
    }

    /**
     * Get funcionariofuncionario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFuncionariofuncionario()
    {
        return $this->funcionariofuncionario;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['salasala'] = $obj_vars['salasala']->getIdsala();
        $obj_vars['professorprofessor'] = $obj_vars['professorprofessor']->getIdprofessor();
        $obj_vars['funcionariofuncionario'] = $obj_vars['funcionariofuncionario']->getIdfuncionario();
        return $obj_vars;
    }


    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array()) 
    {
        //var_dump($data); exit;
        foreach ($data as $property => $value) {
            if (! property_exists($this, $property)) {
                continue;
            }
            $this->$property = $value;
        }
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used!");
    }

    public function getInputFilter()
    {
        if (! $this->inputFilter) {
            $inputFilter = new InputFilter();

            $factory = new InputFactory();


            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    }

}
