<?php

namespace Sala\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Ocorrencia
 *
 * @ORM\Table(name="ocorrencia")
 * @ORM\Entity
 */
class Ocorrencia implements InputFilterAwareInterface
{
    protected $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idocorrencia", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOcorrencia;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $observacao;

    /**
     * @var \Sala\Entity\ReservaSala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\ReservaSala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reserva_sala_idreservaSala", referencedColumnName="idreservaSala", nullable=true)
     * })
     */
    private $reservaSalaOcorrencia;

    /**
     * @var \Funcionario\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario", nullable=true)
     * })
     */
    private $funcionarioOcorrencia;

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
     * Get idOcorrencia
     *
     * @return integer 
     */
    public function getIdOcorrencia()
    {
        return $this->idOcorrencia;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return Ocorrencia
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
     * Set reservaSalaOcorrencia
     *
     * @param \Sala\Entity\ReservaSala $reservaSalaOcorrencia
     * @return Ocorrencia
     */
    public function setReservaSalaOcorrencia(\Sala\Entity\ReservaSala $reservaSalaOcorrencia = null)
    {
        $this->reservaSalaOcorrencia = $reservaSalaOcorrencia;
    
        return $this;
    }

    /**
     * Get reservaSalaOcorrencia
     *
     * @return \Sala\Entity\ReservaSala 
     */
    public function getReservaSalaOcorrencia()
    {
        return $this->reservaSalaOcorrencia;
    }

    /**
     * Set funcionarioOcorrencia
     *
     * @param \Funcionario\Entity\Funcionario $funcionarioOcorrencia
     * @return Ocorrencia
     */
    public function setFuncionarioOcorrencia(\Funcionario\Entity\Funcionario $funcionarioOcorrencia = null)
    {
        $this->funcionarioOcorrencia = $funcionarioOcorrencia;
    
        return $this;
    }

    /**
     * Get funcionarioOcorrencia
     *
     * @return \Funcionario\Entity\Funcionario 
     */
    public function getFuncionarioOcorrencia()
    {
        return $this->funcionarioOcorrencia;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['reservaSalaOcorrencia'] = $obj_vars['reservaSalaOcorrencia']->getIdReservaSala();
        $obj_vars['funcionarioOcorrencia'] = $obj_vars['funcionarioOcorrencia']->getIdfuncionario();
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
                'name'     => 'observacao',
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
