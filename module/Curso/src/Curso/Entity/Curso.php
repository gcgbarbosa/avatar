<?php

namespace Curso\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity
 */
class Curso implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idcurso", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcurso;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeCurso", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomeCurso;

    /**
     * @var \Professor\Entity\Departamento
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamentoCurso", referencedColumnName="idDepartamento", nullable=true)
     * })
     */
    private $departamentoCurso;

    /**
     * @ORM\OneToMany(targetEntity="Aluno\Entity\Aluno", mappedBy="cursoAluno", cascade={"persist"})
     */
    protected $cursocurso;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cursocurso = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cursocurso
     *
     * @param \Aluno\Entity\Aluno $cursocurso
     * @return Professor
     */
    public function addCursocurso(\Aluno\Entity\Aluno $cursocurso)
    {
        $this->cursocurso[] = $cursocurso;
    
        return $this;
    }

    /**
     * Remove cursocurso
     *
     * @param \Aluno\Entity\Aluno $cursocurso
     */
    public function removeCursocurso(\Aluno\Entity\Aluno $cursocurso)
    {
        $this->cursocurso->removeElement($cursocurso);
    }

    /**
     * Get cursocurso
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCursocurso()
    {
        return $this->cursocurso;
    }

    /**
     * Get idcurso
     *
     * @return integer 
     */
    public function getIdcurso()
    {
        return $this->idcurso;
    }

    /**
     * Set nomeCurso
     *
     * @param string $nomeCurso
     * @return Curso
     */
    public function setNomeCurso($nomeCurso)
    {
        $this->nomeCurso = $nomeCurso;
    
        return $this;
    }

    /**
     * Get nomeCurso
     *
     * @return string 
     */
    public function getNomeCurso()
    {
        return $this->nomeCurso;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['departamentoCurso'] = $obj_vars['departamentoCurso']->getIddepartamento();
        return $obj_vars;
    }

    /**
     * Set departamentoCurso
     *
     * @param \Professor\Entity\Departamento $departamentoCurso
     * @return Curso
     */
    public function setDepartamentoCurso(\Professor\Entity\Departamento $departamentoCurso = null)
    {
        $this->departamentoCurso = $departamentoCurso;
    
        return $this;
    }

    /**
     * Get departamentoCurso
     *
     * @return \Professor\Entity\Departamento 
     */
    public function getDepartamentoCurso()
    {
        return $this->departamentoCurso;
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
                'name'     => 'nomeCurso',
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
                'name'     => 'departamentoCurso',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $this->inputFilter = $inputFilter;  

        }

        return $this->inputFilter;
    }
}
