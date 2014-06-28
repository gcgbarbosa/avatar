<?php

namespace Equipamento\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipamento
 *
 * @ORM\Table(name="equipamento")
 * @ORM\Entity
 */
class Equipamento
{
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
     * @ORM\Column(name="nTombo", type="string", length=15, precision=0, scale=0, nullable=false, unique=false)
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
     * @var \Equipamento\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Equipamento\Entity\Sala")
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
     * @param \Equipamento\Entity\Sala $salasala
     * @return Equipamento
     */
    public function setSalasala(\Equipamento\Entity\Sala $salasala = null)
    {
        $this->salasala = $salasala;
    
        return $this;
    }

    /**
     * Get salasala
     *
     * @return \Equipamento\Entity\Sala 
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
}