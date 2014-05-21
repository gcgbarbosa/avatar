<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Equipamento
 *
 * @ORM\Table(name="equipamento")
 * @ORM\Entity
 */
class Equipamento implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idEquipamento", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nTombo", type="string", length=7, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ntombo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $observacao;

    /**
     * @var \Equipamento\Entity\TipoEquipamento
     *
     * @ORM\ManyToOne(targetEntity="Equipamento\Entity\TipoEquipamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoEquipamento_idTipoEquipamento", referencedColumnName="idTipoEquipamento", nullable=true)
     * })
     */
    private $tipoequipamentotipoequipamento;

    /**
     * @var \Sala\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sala_idsala", referencedColumnName="idsala", nullable=true)
     * })
     */
    private $salasala;

    /**
     * @var \Projeto\Entity\Projeto
     *
     * @ORM\ManyToOne(targetEntity="Projeto\Entity\Projeto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projeto_idProjeto", referencedColumnName="idProjeto", nullable=true)
     * })
     */
    private $projetoprojeto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Equipamento\Entity\Tombo", mappedBy="tomboequipamento", cascade={"persist"})
     */
    private $tombotombo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tombotombo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tombotombo
     *
     * @param \Equipamento\Entity\Tombo $tombotombo
     * @return Equipamento
     */
    public function addTombotombo(\Equipamento\Entity\Tombo $tombotombo)
    {
        $this->tombotombo[] = $tombotombo;
    
        return $this;
    }

    /**
     * Remove tombotombo
     *
     * @param \Equipamento\Entity\Tombo $tombotombo
     */
    public function removeTombotombo(\Equipamento\Entity\Tombo $tombotombo)
    {
        $this->tombotombo->removeElement($tombotombo);
    }

    /**
     * Get tombotombo
     *
     * @return string 
     */
    public function getTombotombo()
    {
        return $this->tombotombo;
    }

    /**
     * Get idequipamento
     *
     * @return integer 
     */
    public function getIdequipamento()
    {
        return $this->idequipamento;
    }

    /**
     * Set ntombo
     *
     * @param string $ntombo
     * @return Equipamento
     */
    public function setNtombo($ntombo)
    {
        $this->ntombo = $ntombo;
    
        return $this;
    }

    /**
     * Get ntombo
     *
     * @return string 
     */
    public function getNtombo()
    {
        return $this->ntombo;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return Equipamento
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    
        return $this;
    }

    /**
     * Get observacao
     *
     * @return string 
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set tipoequipamentotipoequipamento
     *
     * @param \Equipamento\Entity\TipoEquipamento $tipoequipamentotipoequipamento
     * @return Equipamento
     */
    public function setTipoequipamentotipoequipamento(\Equipamento\Entity\TipoEquipamento $tipoequipamentotipoequipamento = null)
    {
        $this->tipoequipamentotipoequipamento = $tipoequipamentotipoequipamento;
    
        return $this;
    }

    /**
     * Get tipoequipamentotipoequipamento
     *
     * @return \Equipamento\Entity\TipoEquipamento 
     */
    public function getTipoequipamentotipoequipamento()
    {
        return $this->tipoequipamentotipoequipamento;
    }

    /**
     * Set salasala
     *
     * @param \Sala\Entity\Sala $salasala
     * @return Equipamento
     */
    public function setSalasala(\Sala\Entity\Sala $salasala = null)
    {
        $this->salasala = $salasala;
    
        return $this;
    }

    /**
     * Get salasala
     *
     * @return \Sala\Entity\Sala 
     */
    public function getSalasala()
    {
        return $this->salasala;
    }

    /**
     * Set projetoprojeto
     *
     * @param \Projeto\Entity\Projeto $projetoprojeto
     * @return Equipamento
     */
    public function setProjetoprojeto(\Projeto\Entity\Projeto $projetoprojeto = null)
    {
        $this->projetoprojeto = $projetoprojeto;
    
        return $this;
    }

    /**
     * Get projetoprojeto
     *
     * @return \Projeto\Entity\Projeto 
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
        $obj_vars['tipoequipamentotipoequipamento'] = $obj_vars['tipoequipamentotipoequipamento']->getIdtipoequipamento();
        $obj_vars['salasala'] = $obj_vars['salasala']->getIdsala();
        $obj_vars['projetoprojeto'] = $obj_vars['projetoprojeto']->getIdprojeto();
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
                'name'     => 'ntombo',
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
                'name'     => 'observacao',
                'required' => false,
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
                'name'     => 'tipoequipamentotipoequipamento',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'salasala',
                'required' => true,
                'filters'  => array(
                    //array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'projetoprojeto',
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
