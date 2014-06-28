<?php

namespace Application\Entity;

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
     * @ORM\Column(name="idsala", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsala;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \Application\Entity\Local
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local_idlocal", referencedColumnName="idlocal")
     * })
     */
    private $locallocal;


}
