<?php

namespace Application\Entity;

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
     * @ORM\Column(name="idEquipamento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nTombo", type="string", length=15, nullable=false)
     */
    private $ntombo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", nullable=true)
     */
    private $observacao;

    /**
     * @var \Application\Entity\TipoEquipamento
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TipoEquipamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoEquipamento_idTipoEquipamento", referencedColumnName="idTipoEquipamento")
     * })
     */
    private $tipoequipamentotipoequipamento;

    /**
     * @var \Application\Entity\Sala
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Sala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sala_idsala", referencedColumnName="idsala")
     * })
     */
    private $salasala;

    /**
     * @var \Application\Entity\Projeto
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Projeto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projeto_idProjeto", referencedColumnName="idProjeto")
     * })
     */
    private $projetoprojeto;


}
