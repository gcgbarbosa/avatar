<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sala
 *
 * @ORM\Table(name="sala")
 * @ORM\Entity
 */
class Sala
{
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
     * @var \Equipamento\Entity\Local
     *
     * @ORM\ManyToOne(targetEntity="Equipamento\Entity\Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local_idlocal", referencedColumnName="idlocal", nullable=true)
     * })
     */
    private $locallocal;


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
     * @param \Equipamento\Entity\Local $locallocal
     * @return Sala
     */
    public function setLocallocal(\Equipamento\Entity\Local $locallocal = null)
    {
        $this->locallocal = $locallocal;
    
        return $this;
    }

    /**
     * Get locallocal
     *
     * @return \Equipamento\Entity\Local 
     */
    public function getLocallocal()
    {
        return $this->locallocal;
    }
}
