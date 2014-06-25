<?php

namespace Controle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Controle
 *
 * @ORM\Table(name="controle")
 * @ORM\Entity
 */
class Controle implements InputFilterAwareInterface 
{
    protected $inputFilter;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idControle", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idControle;

    /**
     * @var \Aluno\Entity\Aluno
     *
     * @ORM\ManyToOne(targetEntity="Aluno\Entity\Aluno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alunoControle", referencedColumnName="idaluno", nullable=true)
     * })
     */
    private $alunoControle;

    /**
     * @var \Curso\Entity\Curso
     *
     * @ORM\ManyToOne(targetEntity="Curso\Entity\Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cursoControle", referencedColumnName="idcurso", nullable=true)
     * })
     */
    private $cursoControle;

    /**
     * @var \Sala\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salaControle", referencedColumnName="idsala", nullable=true)
     * })
     */
    private $salaControle;

    /**
     * @var \Professor\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsavelControle", referencedColumnName="idProfessor", nullable=true)
     * })
     */
    private $responsavelControle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataEntradaControle", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataEntradaControle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataSaidaControle", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataSaidaControle;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoControle", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $objetivoControle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statusControle", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $statusControle;
    
    /**
     * Get idControle
     *
     * @return integer 
     */
    public function getIdControle()
    {
        return $this->idControle;
    }

    /**
     * Set alunoControle
     *
     * @param \Aluno\Entity\Aluno $alunoControle
     * @return Controle
     */
    public function setAlunoControle(\Aluno\Entity\Aluno $alunoControle = null)
    {
        $this->alunoControle = $alunoControle;
    
        return $this;
    }

    /**
     * Get alunoControle
     *
     * @return \Aluno\Entity\Aluno 
     */
    public function getAlunoControle()
    {
        return $this->alunoControle;
    }

    /**
     * Set cursoControle
     *
     * @param \Curso\Entity\Curso $cursoControle
     * @return Controle
     */
    public function setCursoControle(\Curso\Entity\Curso $cursoControle = null)
    {
        $this->cursoControle = $cursoControle;
    
        return $this;
    }

    /**
     * Get cursoControle
     *
     * @return \Curso\Entity\Curso 
     */
    public function getCursoControle()
    {
        return $this->cursoControle;
    }

    /**
     * Set salaControle
     *
     * @param \Sala\Entity\Sala $salaControle
     * @return Controle
     */
    public function setSalaControle(\Sala\Entity\Sala $salaControle = null)
    {
        $this->salaControle = $salaControle;
    
        return $this;
    }

    /**
     * Get salaControle
     *
     * @return \Sala\Entity\Sala 
     */
    public function getSalaControle()
    {
        return $this->salaControle;
    }

    /**
     * Set responsavelControle
     *
     * @param \Professor\Entity\Professor $responsavelControle
     * @return Controle
     */
    public function setResponsavelControle(\Professor\Entity\Professor $responsavelControle = null)
    {
        $this->responsavelControle = $responsavelControle;
    
        return $this;
    }

    /**
     * Get responsavelControle
     *
     * @return \Professor\Entity\Professor 
     */
    public function getResponsavelControle()
    {
        return $this->responsavelControle;
    }

    /**
     * Set dataEntradaControle
     *
     * @param \DateTime $dataEntradaControle
     * @return Controle
     */
    public function setDataEntradaControle($dataEntradaControle)
    {
        $this->dataEntradaControle = $dataEntradaControle;
    
        return $this;
    }

    /**
     * Get dataEntradaControle
     *
     * @return \DateTime 
     */
    public function getDataEntradaControle()
    {
        return $this->dataEntradaControle;
    }

    /**
     * Set dataSaidaControle
     *
     * @param \DateTime $dataSaidaControle
     * @return Controle
     */
    public function setDataSaidaControle($dataSaidaControle)
    {
        $this->dataSaidaControle = $dataSaidaControle;
    
        return $this;
    }

    /**
     * Get dataSaidaControle
     *
     * @return \DateTime 
     */
    public function getDataSaidaControle()
    {
        return $this->dataSaidaControle;
    }

    /**
     * Set objetivoControle
     *
     * @param string $objetivoControle
     * @return Controle
     */
    public function setObjetivoControle($objetivoControle)
    {
        $this->objetivoControle = $objetivoControle;
    
        return $this;
    }

    /**
     * Get objetivoControle
     *
     * @return string 
     */
    public function getObjetivoControle()
    {
        return $this->objetivoControle;
    }

    /**
     * Set statusControle
     *
     * @param boolean $statusControle
     * @return Controle
     */
    public function setStatusControle($statusControle)
    {
        $this->statusControle = $statusControle;
    
        return $this;
    }

    /**
     * Get statusControle
     *
     * @return boolean 
     */
    public function getStatusControle()
    {
        return $this->statusControle;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['dataEntradaControle'] = $obj_vars['dataEntradaControle']->format('d/m/Y H:i:s');
        $obj_vars['dataSaidaControle'] = $obj_vars['dataSaidaControle']->format('d/m/Y H:i:s');
        $obj_vars['statusControle'] = $obj_vars['statusControle'] == true ? "true" : "false";
        $obj_vars['alunoControle'] = $obj_vars['alunoControle']->getIdaluno();
        $obj_vars['cursoControle'] = $obj_vars['cursoControle']->getIdcurso();
        $obj_vars['salaControle'] = $obj_vars['salaControle']->getIdsala();
        $obj_vars['responsavelControle'] = $obj_vars['responsavelControle']->getIdProfessor();
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
                'name'     => 'objetivoControle',
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
