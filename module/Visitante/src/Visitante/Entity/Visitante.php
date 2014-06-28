<?php

namespace Visitante\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Visitante
 *
 * @ORM\Table(name="visitante")
 * @ORM\Entity
 */
class Visitante implements InputFilterAwareInterface 
{
    protected $inputFilter;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idVisitante", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVisitante;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeVisitante", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomeVisitante;

    /**
     * @var string
     *
     * @ORM\Column(name="profissaoVisitante", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $profissaoVisitante;

    /**
     * @var string
     *
     * @ORM\Column(name="instituicaoVisitante", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $instituicaoVisitante;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoVisitante", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $objetivoVisitante;

    /**
     * Get idVisitante
     *
     * @return integer 
     */
    public function getIdVisitante()
    {
        return $this->idVisitante;
    }

    /**
     * Set nomeVisitante
     *
     * @param string $nomeVisitante
     * @return Visitante
     */
    public function setNomeVisitante($nomeVisitante)
    {
        $this->nomeVisitante = utf8_decode($nomeVisitante);
    
        return $this;
    }

    /**
     * Get nomeVisitante
     *
     * @return string 
     */
    public function getNomeVisitante()
    {
        return $this->nomeVisitante;
    }

    /**
     * Set profissaoVisitante
     *
     * @param string $profissaoVisitante
     * @return Visitante
     */
    public function setProfissaoVisitante($profissaoVisitante)
    {
        $this->profissaoVisitante = $profissaoVisitante;
    
        return $this;
    }

    /**
     * Get profissaoVisitante
     *
     * @return string 
     */
    public function getProfissaoVisitante()
    {
        return $this->profissaoVisitante;
    }

    /**
     * Set instituicaoVisitante
     *
     * @param string $instituicaoVisitante
     * @return Visitante
     */
    public function setInstituicaoVisitante($instituicaoVisitante)
    {
        $this->instituicaoVisitante = $instituicaoVisitante;
    
        return $this;
    }

    /**
     * Get instituicaoVisitante
     *
     * @return string 
     */
    public function getInstituicaoVisitante()
    {
        return $this->instituicaoVisitante;
    }

    /**
     * Set objetivoVisitante
     *
     * @param string $objetivoVisitante
     * @return Visitante
     */
    public function setObjetivoVisitante($objetivoVisitante)
    {
        $this->objetivoVisitante = $objetivoVisitante;
    
        return $this;
    }

    /**
     * Get objetivoVisitante
     *
     * @return string 
     */
    public function getObjetivoVisitante()
    {
        return $this->objetivoVisitante;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
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
                'name'     => 'nomeVisitante',
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
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'profissaoVisitante',
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
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'instituicaoVisitante',
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
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'objetivoVisitante',
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
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    } 
}
