<?php

namespace Equipamento\Entity;

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
     * @ORM\Column(name="idlocal", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlocal;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeLocal", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomelocal;


    /**
     * Get idlocal
     *
     * @return integer 
     */
    public function getIdlocal()
    {
        return $this->idlocal;
    }

    /**
     * Set nomelocal
     *
     * @param string $nomelocal
     * @return Local
     */
    public function setNomelocal($nomelocal)
    {
        $this->nomelocal = $nomelocal;
    
        return $this;
    }

    /**
     * Get nomelocal
     *
     * @return string 
     */
    public function getNomelocal()
    {
        return $this->nomelocal;
    }
}
