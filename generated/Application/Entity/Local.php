<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity
 */
class Local
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlocal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlocal;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeLocal", type="string", length=45, nullable=false)
     */
    private $nomelocal;


}
