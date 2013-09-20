<?php

namespace Funcionario\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario")
 * @ORM\Entity
 */
class Funcionario implements InputFilterAwareInterface 
{
    protected $inputFilter;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $datanasc;

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
    /**
     * Get projetoprojeto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjetoprojeto()
    {
        return $this->projetoprojeto;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['datanasc'] = $obj_vars['datanasc']->format('d/m/Y');
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


            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    } 
}
