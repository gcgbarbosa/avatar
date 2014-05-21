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
     * @ORM\Column(name="idreservaSala", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservaSala;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $objetivo;

    /**
     * @var \string
     *
     * @ORM\Column(name="dataInicio", type="string", length=5, precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataInicio;

    /**
     * @var \string
     *
     * @ORM\Column(name="dataFim", type="string", length=5, precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataFim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataReserva", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataReserva;

    /**
     * @var \Sala\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sala_idsala", referencedColumnName="idsala", nullable=true)
     * })
     */
    private $salaReserva;

    /**
     * @var \Professor\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idProfessor", referencedColumnName="idProfessor", nullable=true)
     * })
     */
    private $professorReserva;

    /**
     * @var \Funcionario\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario", nullable=true)
     * })
     */
    private $funcionarioReserva;

    /**
     * Get idreservaSala
     *
     * @return integer 
     */
    public function getIdReservaSala()
    {
        return $this->idreservaSala;
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
     * Set dataInicio
     *
     * @param string $dataInicio
     * @return ReservaSala
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    
        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return string 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param string $dataFim
     * @return ReservaSala
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
    
        return $this;
    }

    /**
     * Get dataFim
     *
     * @return string 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set dataReserva
     *
     * @param \DateTime $dataReserva
     * @return ReservaSala
     */
    public function setDataReserva($dataReserva)
    {
        $this->dataReserva = $dataReserva;
    
        return $this;
    }

    /**
     * Get dataReserva
     *
     * @return \DateTime 
     */
    public function getDataReserva()
    {
        return $this->dataReserva;
    }

    /**
     * Set salaReserva
     *
     * @param \Sala\Entity\ReservaSala $salaReserva
     * @return ReservaSala
     */
    public function setSalaReserva(\Sala\Entity\Sala $salaReserva = null)
    {
        $this->salaReserva = $salaReserva;
    
        return $this;
    }

    /**
     * Get salaReserva
     *
     * @return \Sala\Entity\ReservaSala 
     */
    public function getSalaReserva()
    {
        return $this->salaReserva;
    }

    /**
     * Set funcionarioReserva
     *
     * @param \Funcionario\Entity\Funcionario $funcionarioReserva
     * @return ReservaSala
     */
    public function setFuncionarioReserva(\Funcionario\Entity\Funcionario $funcionarioReserva = null)
    {
        $this->funcionarioReserva = $funcionarioReserva;
    
        return $this;
    }

    /**
     * Get funcionarioReserva
     *
     * @return \Funcionario\Entity\Funcionario 
     */
    public function getFuncionarioReserva()
    {
        return $this->funcionarioReserva;
    }

    /**
     * Set professorReserva
     *
     * @param \Professor\Entity\Professor $professorReserva
     * @return ReservaSala
     */
    public function setProfessorReserva(\Professor\Entity\Professor $professorReserva = null)
    {
        $this->professorReserva = $professorReserva;
    
        return $this;
    }

    /**
     * Get professorReserva
     *
     * @return \Professor\Entity\Professor 
     */
    public function getProfessorReserva()
    {
        return $this->professorReserva;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['dataReserva'] = $obj_vars['dataReserva']->format('d/m/Y');
        $obj_vars['salaReserva'] = $obj_vars['salaReserva']->getIdsala();
        $obj_vars['funcionarioReserva'] = $obj_vars['funcionarioReserva']->getIdfuncionario();
        $obj_vars['professorReserva'] = $obj_vars['professorReserva']->getIdprofessor();
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

            $inputFilter->add($factory->createInput(array(
                'name'     => 'objetivo',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'dataInicio',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 5,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'dataFim',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 5,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'dataReserva',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'date',
                        'options' => array(
                            'locale' => 'pt_BR', 
                            'format' => 'd/m/Y'),
                        ),
                    ),
            )));

            $this->inputFilter = $inputFilter;  

        }

        return $this->inputFilter;
    }
}
