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
     * @ORM\Column(name="idocorrencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idocorrencia;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", nullable=false)
     */
    private $observacao;

    /**
     * @var \Sala\Entity\ReservaSala
     *
     * @ORM\ManyToOne(targetEntity="Sala\Entity\ReservaSala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reserva_sala_idreservaSala", referencedColumnName="idreservaSala")
     * })
     */
    private $reservaSalareservasala;

    /**
     * @var \Funcionario\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario")
     * })
     */
    private $funcionariofuncionario;

    /**
     * Get idocorrencia
     *
     * @return integer 
     */
    public function getIdocorrencia()
    {
        return $this->idocorrencia;
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
     * Set reservaSalareservasala
     *
     * @param \Sala\Entity\Ocorrencia $reservaSalareservasala
     * @return Ocorrencia
     */
    public function setReservaSalareservasala(\Sala\Entity\ReservaSala $reservaSalareservasala = null)
    {
        $this->reservaSalareservasala = $reservaSalareservasala;
    
        return $this;
    }

    /**
     * Get reservaSalareservasala
     *
     * @return \Sala\Entity\Ocorrencia 
     */
    public function getReservaSalareservasala()
    {
        return $this->reservaSalareservasala;
    }

    /**
     * Set funcionariofuncionario
     *
     * @param \Sala\Entity\Ocorrencia $funcionariofuncionario
     * @return Ocorrencia
     */
    public function setFuncionariofuncionario(\Funcionario\Entity\Funcionario $funcionariofuncionario = null)
    {
        $this->funcionariofuncionario = $funcionariofuncionario;
    
        return $this;
    }

    /**
     * Get funcionariofuncionario
     *
     * @return \Sala\Entity\Ocorrencia 
     */
    public function getFuncionariofuncionario()
    {
        return $this->funcionariofuncionario;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $obj_vars = get_object_vars($this);
        $obj_vars['reservaSalareservasala'] = $obj_vars['reservaSalareservasala']->getIdreservasala();
        $obj_vars['funcionariofuncionario'] = $obj_vars['funcionariofuncionario']->getIdFuncionario();
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
