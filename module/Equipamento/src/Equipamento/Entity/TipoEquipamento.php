<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * TipoEquipamento
 *
 * @ORM\Table(name="tipo_equipamento")
 * @ORM\Entity
 */
class TipoEquipamento implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoEquipamento", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeTipoEquipamento", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nometipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoTipoEquipamento", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $descricaotipoequipamento;


    /**
     * Get idtipoequipamento
     *
     * @return integer 
     */
    public function getIdtipoequipamento()
    {
        return $this->idtipoequipamento;
    }

    /**
     * Set nometipoequipamento
     *
     * @param string $nometipoequipamento
     * @return TipoEquipamento
     */
    public function setNometipoequipamento($nometipoequipamento)
    {
        $this->nometipoequipamento = $nometipoequipamento;
    
        return $this;
    }

    /**
     * Get nometipoequipamento
     *
     * @return string 
     */
    public function getNometipoequipamento()
    {
        return $this->nometipoequipamento;
    }

    /**
     * Set descricaotipoequipamento
     *
     * @param string $descricaotipoequipamento
     * @return TipoEquipamento
     */
    public function setDescricaotipoequipamento($descricaotipoequipamento)
    {
        $this->descricaotipoequipamento = $descricaotipoequipamento;
    
        return $this;
    }

    /**
     * Get descricaotipoequipamento
     *
     * @return string 
     */
    public function getDescricaotipoequipamento()
    {
        return $this->descricaotipoequipamento;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        return get_object_vars($this);
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
                'name'     => 'nometipoequipamento',
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
                'name'     => 'descricaotipoequipamento',
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


            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    }
}
