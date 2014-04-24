<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Tombo
 *
 * @ORM\Table(name="tombo")
 * @ORM\Entity
 */
class Tombo implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idTombo", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTombo;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroTombo", type="string", length=7, precision=0, scale=0, nullable=false, unique=true)
     */
    private $numeroTombo;

    /**
     * @var \Equipamento\Entity\Equipamento
     *
     * @ORM\ManyToOne(targetEntity="Equipamento\Entity\Equipamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipamento", referencedColumnName="idEquipamento", nullable=true)
     * })
     */
    private $equipamentoequipamento;

    /**
     * Set equipamentoequipamento
     *
     * @param \Equipamento\Entity\Equipamento $equipamentoequipamento
     * @return Tombo
     */
    public function setEquipamentoequipamento(\Equipamento\Entity\Equipamento $equipamentoequipamento = null)
    {
        $this->equipamentoequipamento = $equipamentoequipamento;
    
        return $this;
    }

    /**
     * Get equipamentoequipamento
     *
     * @return \Equipamento\Entity\Equipamento 
     */
    public function getEquipamentoequipamento()
    {
        return $this->equipamentoequipamento;
    }

    /**
     * Get idTombo
     *
     * @return integer 
     */
    public function getIdTombo()
    {
        return $this->idTombo;
    }

    /**
     * Set numeroTombo
     *
     * @param string $numeroTombo
     * @return Tombo
     */
    public function setNumeroTombo($numeroTombo)
    {
        $this->numeroTombo = $numeroTombo;
    
        return $this;
    }

    /**
     * Get numeroTombo
     *
     * @return string 
     */
    public function getNumeroTombo()
    {
        return $this->numeroTombo;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['equipamentoequipamento'] = $obj_vars['equipamentoequipamento']->getIdequipamento();
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
                'name'     => 'numerotombo',
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
                            'max'      => 7,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'equipamentoequipamento',
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
