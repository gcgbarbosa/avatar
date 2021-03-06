<?php

namespace Aluno\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Aluno
 *
 * @ORM\Table(name="aluno")
 * @ORM\Entity
 */
class Aluno implements InputFilterAwareInterface 
{
    protected $inputFilter;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idaluno", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeAluno", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="emailAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $emailaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $telefonealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculaAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $matriculaaluno;

    /**
     * @var \Curso\Entity\Curso
     *
     * @ORM\ManyToOne(targetEntity="Curso\Entity\Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cursoAluno", referencedColumnName="idcurso", nullable=true)
     * })
     */
    private $cursoAluno;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bolsista", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $bolsista;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $datanasc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Projeto\Entity\Projeto", inversedBy="alunoaluno")
     * @ORM\JoinTable(name="aluno_has_projeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="aluno_idaluno", referencedColumnName="idaluno", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Projeto_idProjeto", referencedColumnName="idProjeto", nullable=true)
     *   }
     * )
     */
    private $alunoprojeto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alunoprojeto = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idaluno
     *
     * @return integer 
     */
    public function getIdaluno()
    {
        return $this->idaluno;
    }

    /**
     * Set nomealuno
     *
     * @param string $nomealuno
     * @return Aluno
     */
    public function setNomealuno($nomealuno)
    {
        $this->nomealuno = utf8_decode($nomealuno);
    
        return $this;
    }

    /**
     * Get nomealuno
     *
     * @return string 
     */
    public function getNomealuno()
    {
        return $this->nomealuno;
    }

    /**
     * Set emailaluno
     *
     * @param string $emailaluno
     * @return Aluno
     */
    public function setEmailaluno($emailaluno)
    {
        $this->emailaluno = $emailaluno;
    
        return $this;
    }

    /**
     * Get emailaluno
     *
     * @return string 
     */
    public function getEmailaluno()
    {
        return $this->emailaluno;
    }

    /**
     * Set telefonealuno
     *
     * @param string $telefonealuno
     * @return Aluno
     */
    public function setTelefonealuno($telefonealuno)
    {
        $this->telefonealuno = $telefonealuno;
    
        return $this;
    }

    /**
     * Get telefonealuno
     *
     * @return string 
     */
    public function getTelefonealuno()
    {
        return $this->telefonealuno;
    }

    /**
     * Set matriculaaluno
     *
     * @param string $matriculaaluno
     * @return Aluno
     */
    public function setMatriculaaluno($matriculaaluno)
    {
        $this->matriculaaluno = $matriculaaluno;
    
        return $this;
    }

    /**
     * Get matriculaaluno
     *
     * @return string 
     */
    public function getMatriculaaluno()
    {
        return $this->matriculaaluno;
    }

    /**
     * Set cursoAluno
     *
     * @param \Curso\Entity\Curso $cursoAluno
     * @return Aluno
     */
    public function setCursoAluno(\Curso\Entity\Curso $cursoAluno = null)
    {
        $this->cursoAluno = $cursoAluno;
    
        return $this;
    }

    /**
     * Get cursoAluno
     *
     * @return \Curso\Entity\Curso 
     */
    public function getCursoAluno()
    {
        return $this->cursoAluno;
    }

    /**
     * Set bolsista
     *
     * @param boolean $bolsista
     * @return Aluno
     */
    public function setBolsista($bolsista)
    {
        $this->bolsista = $bolsista;
    
        return $this;
    }

    /**
     * Get bolsista
     *
     * @return boolean 
     */
    public function getBolsista()
    {
        return $this->bolsista;
    }

    /**
     * Set datanasc
     *
     * @param \DateTime $datanasc
     * @return Aluno
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
     * Add alunoprojeto
     *
     * @param \Projeto\Entity\Projeto $alunoprojeto
     * @return Aluno
     */
    public function addProjetoprojeto(\Projeto\Entity\Projeto $alunoprojeto)
    {
        $this->alunoprojeto[] = $alunoprojeto;
    
        return $this;
    }

    /**
     * Remove alunoprojeto
     *
     * @param \Projeto\Entity\Projeto $alunoprojeto
     */
    public function removeProjetoprojeto(\Projeto\Entity\Projeto $alunoprojeto)
    {
        $this->alunoprojeto->removeElement($alunoprojeto);
    }

    /**
     * Get alunoprojeto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjetoprojeto()
    {
        return $this->alunoprojeto;
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
        $obj_vars['bolsista'] = $obj_vars['bolsista'] == true ? "true" : "false";
        $obj_vars['cursoAluno'] = $obj_vars['cursoAluno']->getIdcurso();
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
                'name'     => 'nomealuno',
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
                'name'     => 'emailaluno',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    /*array(
                        'name' => 'record_exists',
                        'options' => array(
                            'allow' => Hostname::ALLOW_DNS,
                            'deep' => FALSE, 
                            'domain' => TRUE, 
                            'mx' => FALSE
                        ),
                    ),*/
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'telefonealuno',
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
                            'max'      => 14,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'matriculaaluno',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    /*array(
                        'name'    => 'Int',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 9,
                        ),
                    ), */
                ),
            )));

              $inputFilter->add($factory->createInput(array(
                'name'     => 'datanasc',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'date',
                        'options' => array(
                            'locale' => 'pt_BR', 
                            'format' => 'd/m/Y'),
                        ),
                    ),
            )));

            
            
            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    } 
}
