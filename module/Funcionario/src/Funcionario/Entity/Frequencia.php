<?php

namespace Funcionario\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia")
 * @ORM\Entity
 */
class Frequencia implements InputFilterAwareInterface 
{
    protected $inputFilter;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idFrequencia", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfrequencia;

    /**
     * @var \string
     *
     * @ORM\Column(name="horarioEntrada", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $horarioentrada;

    /**
     * @var \string
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
     * @var boolean
     *
     * @ORM\Column(name="statusFrequencia", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $statusFrequencia;

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

    /**
     * Set statusFrequencia
     *
     * @param boolean $statusFrequencia
     * @return Controle
     */
    public function setStatusFrequencia($statusFrequencia)
    {
        $this->statusFrequencia = $statusFrequencia;
    
        return $this;
    }

    /**
     * Get statusFrequencia
     *
     * @return boolean 
     */
    public function getStatusFrequencia()
    {
        return $this->statusFrequencia;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['horarioentrada'] = $obj_vars['horarioentrada']->format('d/m/Y H:i:s');
        $obj_vars['horariosaida'] = $obj_vars['horariosaida']->format('d/m/Y H:i:s');
        $obj_vars['funcionariofuncionario'] = $obj_vars['funcionariofuncionario']->getIdfuncionario();
        $obj_vars['statusFrequencia'] = $obj_vars['statusFrequencia'] == true ? "true" : "false";
        return $obj_vars;
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array()) 
    {
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
                'name'     => 'funcionariofuncionario',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            )));

            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    } 
}
