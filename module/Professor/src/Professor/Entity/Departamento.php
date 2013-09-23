<?php

namespace Professor\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity
 */
class Departamento implements InputFilterAwareInterface 
{
    protected $inputFilter;
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
