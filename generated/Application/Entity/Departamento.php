<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity
 */
class Departamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDepartamento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeDepartamento", type="string", length=45, nullable=false)
     */
    private $nomedepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descricaoDepartamento", type="text", nullable=true)
     */
    private $descricaodepartamento;


}
