<?php

namespace Sala\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Sala
 *
 * @ORM\Table(name="sala")
 * @ORM\Entity
 */
class Sala implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idsala", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsala;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nome;

    /**
     * @var \Sala\Entity\Local
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local_idlocal", referencedColumnName="idlocal", nullable=true)
     * })
     */
    private $locallocal;

    /**
     * @ORM\OneToMany(targetEntity="Equipamento\Entity\Equipamento", mappedBy="salasala", cascade={"persist"})
     */
    protected $salaequipamento;

        /**
     * @ORM\OneToMany(targetEntity="Projeto\Entity\GrupoPesquisa", mappedBy="salasala", cascade={"persist"})
     */
    protected $salagrupopesquisa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->salaequipamento = new \Doctrine\Common\Collections\ArrayCollection();
         $this->salagrupopesquisa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add salaequipamento
     *
     * @param \Equipamento\Entity\Equipamento $salaequipamento
     * @return Professor
     */
    public function addSalaequipamento(\Equipamento\Entity\Equipamento $salaequipamento)
    {
        $this->salaequipamento[] = $salaequipamento;
    
        return $this;
    }

    /**
     * Remove salaequipamento
     *
     * @param \Equipamento\Entity\Equipamento $salaequipamento
     */
    public function removeSalaequipamento(\Equipamento\Entity\Equipamento $salaequipamento)
    {
        $this->salaequipamento->removeElement($salaequipamento);
    }

    /**
     * Get salaequipamento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSalaequipamento()
    {
        return $this->salaequipamento;
    }

    /**
     * Get idsala
     *
     * @return integer 
     */
    public function getIdsala()
    {
        return $this->idsala;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Sala
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set locallocal
     *
     * @param \Sala\Entity\Local $locallocal
     * @return Sala
     */
    public function setLocallocal(\Sala\Entity\Local $locallocal = null)
    {
        $this->locallocal = $locallocal;
    
        return $this;
    }

    /**
     * Get locallocal
     *
     * @return \Sala\Entity\Local 
     */
    public function getLocallocal()
    {
        return $this->locallocal;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['locallocal'] = $obj_vars['locallocal']->getIdLocal();
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
                'name'     => 'nome',
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
