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
     * @ORM\Column(name="horarioEntrada", type="string", length=5, precision=0, scale=0, nullable=false, unique=false)
     */
    private $horarioentrada;

    /**
     * @var \string
     *
     * @ORM\Column(name="horarioSaida", type="string", length=5, precision=0, scale=0, nullable=false, unique=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="dataFrequencia", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataFrequencia;

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
     * @param string $horarioentrada
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
     * @return string 
     */
    public function getHorarioentrada()
    {
        return $this->horarioentrada;
    }

    /**
     * Set horariosaida
     *
     * @param string $horariosaida
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
     * @return string 
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
     * Set dataFrequencia
     *
     * @param \DateTime $dataFrequencia
     * @return Frequencia
     */
    public function setDataFrequencia($dataFrequencia)
    {
        $this->dataFrequencia = $dataFrequencia;
    
        return $this;
    }

    /**
     * Get dataFrequencia
     *
     * @return \DateTime 
     */
    public function getDataFrequencia()
    {
        return $this->dataFrequencia;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['dataFrequencia'] = $obj_vars['dataFrequencia']->format('d/m/Y');
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
                'name'     => 'horarioEntrada',
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
                'name'     => 'horarioSaida',
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
                'name'     => 'funcionariofuncionario',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'dataFrequencia',
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
