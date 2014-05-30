<?php

namespace Curso\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Atuacao
 *
 * @ORM\Table(name="areaatuacao")
 * @ORM\Entity
 */
class Atuacao implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idAreaAtuacao", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAreaAtuacao;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeAreaAtuacao", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomeAreaAtuacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Projeto\Entity\GrupoPesquisa", inversedBy="atuacaoatuacao")
     * @ORM\JoinTable(name="atuacao_has_pesquisa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="atuacao_idAtuacao", referencedColumnName="idAreaAtuacao", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pesquisa_idGrupoPesquisa", referencedColumnName="idGrupoPesquisa", nullable=true)
     *   }
     * )
     */
    private $atuacaoGrupoPesquisa;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->atuacaoGrupoPesquisa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add atuacaoGrupoPesquisa
     *
     * @param \Projeto\Entity\GrupoPesquisa $professorprojeto
     * @return Atuacao
     */
    public function addAtuacaoGrupoPesquisa(\Projeto\Entity\GrupoPesquisa $professorprojeto)
    {
        $this->professorprojeto[] = $professorprojeto;
    
        return $this;
    }

    /**
     * Remove professorprojeto
     *
     * @param \Projeto\Entity\GrupoPesquisa $professorprojeto
     */
    public function removeAtuacaoGrupoPesquisa(\Projeto\Entity\GrupoPesquisa $professorprojeto)
    {
        $this->professorprojeto->removeElement($professorprojeto);
    }

    /**
     * Get atuacaoGrupoPesquisa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtuacaoGrupoPesquisa()
    {
        return $this->atuacaoGrupoPesquisa;
    }

    /**
     * Get idAreaAtuacao
     *
     * @return integer 
     */
    public function getIdAreaAtuacao()
    {
        return $this->idAreaAtuacao;
    }

    /**
     * Set nomeAreaAtuacao
     *
     * @param string $nomeAreaAtuacao
     * @return Atuacao
     */
    public function setNomeAreaAtuacao($nomeAreaAtuacao)
    {
        $this->nomeAreaAtuacao = $nomeAreaAtuacao;
    
        return $this;
    }

    /**
     * Get nomeAreaAtuacao
     *
     * @return string 
     */
    public function getNomeAreaAtuacao()
    {
        return $this->nomeAreaAtuacao;
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
                'name'     => 'nomeAreaAtuacao',
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
