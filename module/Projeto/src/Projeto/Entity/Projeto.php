<?php

namespace Projeto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Projeto
 *
 * @ORM\Table(name="projeto")
 * @ORM\Entity
 */
class Projeto implements InputFilterAwareInterface 
{

    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idProjeto", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprojeto;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=70, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoGeral", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $objetivogeral;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoEspec", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $objetivoespec;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadosEsperados", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $resultadosesperados;

    /**
     * @var boolean
     *
     * @ORM\Column(name="finaciamento", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $finaciamento;

    /**
     * @var string
     *
     * @ORM\Column(name="fonteFinaciamento", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fontefinaciamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Aluno\Entity\Aluno", mappedBy="alunoprojeto")
     */
    private $alunoaluno;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Professor\Entity\Professor", mappedBy="professorprojeto")
     */
    private $professorprofessor;

    /**
     * @var \Professor\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idCoordenador", referencedColumnName="idProfessor", nullable=true)
     * })
     */
    private $professorcoordenador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alunoaluno = new \Doctrine\Common\Collections\ArrayCollection();
        $this->professorprofessor = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idprojeto
     *
     * @return integer 
     */
    public function getIdprojeto()
    {
        return $this->idprojeto;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Projeto
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set objetivogeral
     *
     * @param string $objetivogeral
     * @return Projeto
     */
    public function setObjetivogeral($objetivogeral)
    {
        $this->objetivogeral = $objetivogeral;
    
        return $this;
    }

    /**
     * Get objetivogeral
     *
     * @return string 
     */
    public function getObjetivogeral()
    {
        return $this->objetivogeral;
    }

    /**
     * Set objetivoespec
     *
     * @param string $objetivoespec
     * @return Projeto
     */
    public function setObjetivoespec($objetivoespec)
    {
        $this->objetivoespec = $objetivoespec;
    
        return $this;
    }

    /**
     * Get objetivoespec
     *
     * @return string 
     */
    public function getObjetivoespec()
    {
        return $this->objetivoespec;
    }

    /**
     * Set resultadosesperados
     *
     * @param string $resultadosesperados
     * @return Projeto
     */
    public function setResultadosesperados($resultadosesperados)
    {
        $this->resultadosesperados = $resultadosesperados;
    
        return $this;
    }

    /**
     * Get resultadosesperados
     *
     * @return string 
     */
    public function getResultadosesperados()
    {
        return $this->resultadosesperados;
    }

    /**
     * Set finaciamento
     *
     * @param boolean $finaciamento
     * @return Projeto
     */
    public function setFinaciamento($finaciamento)
    {
        $this->finaciamento = $finaciamento;
    
        return $this;
    }

    /**
     * Get finaciamento
     *
     * @return boolean 
     */
    public function getFinaciamento()
    {
        return $this->finaciamento;
    }

    /**
     * Set fontefinaciamento
     *
     * @param string $fontefinaciamento
     * @return Projeto
     */
    public function setFontefinaciamento($fontefinaciamento)
    {
        $this->fontefinaciamento = $fontefinaciamento;
    
        return $this;
    }

    /**
     * Get fontefinaciamento
     *
     * @return string 
     */
    public function getFontefinaciamento()
    {
        return $this->fontefinaciamento;
    }

    /**
     * Add alunoaluno
     *
     * @param \Aluno\Entity\Aluno $alunoaluno
     * @return Projeto
     */
    public function addAlunoaluno(\Aluno\Entity\Aluno $alunoaluno)
    {
        $this->alunoaluno[] = $alunoaluno;
    
        return $this;
    }

    /**
     * Remove alunoaluno
     *
     * @param \Aluno\Entity\Aluno $alunoaluno
     */
    public function removeAlunoaluno(\Aluno\Entity\Aluno $alunoaluno)
    {
        $this->alunoaluno->removeElement($alunoaluno);
    }

    /**
     * Get alunoaluno
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlunoaluno()
    {
        return $this->alunoaluno;
    }

    /**
     * Add professorprofessor
     *
     * @param \Professor\Entity\Professor $professorprofessor
     * @return Projeto
     */
    public function addProfessorprofessor(\Professor\Entity\Professor $professorprofessor)
    {
        $this->professorprofessor[] = $professorprofessor;
    
        return $this;
    }

    /**
     * Remove professorprofessor
     *
     * @param \Professor\Entity\Professor $professorprofessor
     */
    public function removeProfessorprofessor(\Professor\Entity\Professor $professorprofessor)
    {
        $this->professorprofessor->removeElement($professorprofessor);
    }

    /**
     * Get professorprofessor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfessorprofessor()
    {
        return $this->professorprofessor;
    }

    /**
     * Set professorcoordenador
     *
     * @param \Professor\Entity\Professor $professorcoordenador
     * @return Projeto
     */
    public function setProfessorcoordenador(\Professor\Entity\Professor $professorcoordenador = null)
    {
        $this->professorcoordenador = $professorcoordenador;
    
        return $this;
    }

    /**
     * Get professorcoordenador
     *
     * @return \Professor\Entity\Professor 
     */
    public function getProfessorcoordenador()
    {
        return $this->professorcoordenador;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['finaciamento'] = $obj_vars['finaciamento'] == true ? "true" : "false";
        $obj_vars['professorcoordenador'] = $obj_vars['professorcoordenador']->getIdProfessor();
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


            $this->inputFilter = $inputFilter;        
        }

        return $this->inputFilter;
    } 
}
