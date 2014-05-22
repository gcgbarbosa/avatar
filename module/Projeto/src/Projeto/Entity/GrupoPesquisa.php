<?php

namespace Projeto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * GrupoPesquisa
 *
 * @ORM\Table(name="grupo_pesquisa")
 * @ORM\Entity
 */
class GrupoPesquisa implements InputFilterAwareInterface 
{

    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idGrupoPesquisa", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGrupoPesquisa;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeGrupoPesquisa", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomeGrupoPesquisa;

    /**
     * @var string
     *
     * @ORM\Column(name="areasGrupoPesquisa", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $areasGrupoPesquisa;

    
    /**
     * Get idGrupoPesquisa
     *
     * @return integer 
     */
    public function getIdGrupoPesquisa()
    {
        return $this->idGrupoPesquisa;
    }

    /**
     * Set nomeGrupoPesquisa
     *
     * @param string $nomeGrupoPesquisa
     * @return GrupoProjeto
     */
    public function setNomeGrupoPesquisa($nomeGrupoPesquisa)
    {
        $this->nomeGrupoPesquisa = $nomeGrupoPesquisa;
    
        return $this;
    }

    /**
     * Get nomeGrupoPesquisa
     *
     * @return string 
     */
    public function getNomeGrupoPesquisa()
    {
        return $this->nomeGrupoPesquisa;
    }

    /**
     * Set areasGrupoPesquisa
     *
     * @param string $areasGrupoPesquisa
     * @return GrupoProjeto
     */
    public function setAreasGrupoPesquisa($areasGrupoPesquisa)
    {
        $this->areasGrupoPesquisa = $areasGrupoPesquisa;
    
        return $this;
    }

    /**
     * Get areasGrupoPesquisa
     *
     * @return string 
     */
    public function getAreasGrupoPesquisa()
    {
        return $this->areasGrupoPesquisa;
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
                'name'     => 'nomeGrupoPesquisa',
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
                'name'     => 'areasGrupoPesquisa',
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
