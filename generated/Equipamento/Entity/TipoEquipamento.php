<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEquipamento
 *
 * @ORM\Table(name="tipo_equipamento")
 * @ORM\Entity
 */
class TipoEquipamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTipoEquipamento", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeTipoEquipamento", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nometipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoTipoEquipamento", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $descricaotipoequipamento;


    /**
     * Get idtipoequipamento
     *
     * @return integer 
     */
    public function getIdtipoequipamento()
    {
        return $this->idtipoequipamento;
    }

    /**
     * Set nometipoequipamento
     *
     * @param string $nometipoequipamento
     * @return TipoEquipamento
     */
    public function setNometipoequipamento($nometipoequipamento)
    {
        $this->nometipoequipamento = $nometipoequipamento;
    
        return $this;
    }

    /**
     * Get nometipoequipamento
     *
     * @return string 
     */
    public function getNometipoequipamento()
    {
        return $this->nometipoequipamento;
    }

    /**
     * Set descricaotipoequipamento
     *
     * @param string $descricaotipoequipamento
     * @return TipoEquipamento
     */
    public function setDescricaotipoequipamento($descricaotipoequipamento)
    {
        $this->descricaotipoequipamento = $descricaotipoequipamento;
    
        return $this;
    }

    /**
     * Get descricaotipoequipamento
     *
     * @return string 
     */
    public function getDescricaotipoequipamento()
    {
        return $this->descricaotipoequipamento;
    }
}