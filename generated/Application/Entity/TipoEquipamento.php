<?php

namespace Application\Entity;

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
     * @ORM\Column(name="idTipoEquipamento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeTipoEquipamento", type="string", length=45, nullable=false)
     */
    private $nometipoequipamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoTipoEquipamento", type="text", nullable=false)
     */
    private $descricaotipoequipamento;


}
