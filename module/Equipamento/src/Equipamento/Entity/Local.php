<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity
 */
class Local implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idlocal", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlocal;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeLocal", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomelocal;


    /**
     * Get idlocal
     *
     * @return integer 
     */
    public function getIdlocal()
    {
        return $this->idlocal;
    }

    /**
     * Set nomelocal
     *
     * @param string $nomelocal
     * @return Local
     */
    public function setNomelocal($nomelocal)
    {
        $this->nomelocal = $nomelocal;
    
        return $this;
    }

    /**
     * Get nomelocal
     *
     * @return string 
     */
    public function getNomelocal()
    {
        return $this->nomelocal;
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


            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    }
}
