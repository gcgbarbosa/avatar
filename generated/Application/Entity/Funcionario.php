<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario")
 * @ORM\Entity
 */
class Funcionario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFuncionario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeFuncionario", type="string", length=100, nullable=false)
     */
    private $nomefuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="emailFuncionario", type="string", length=45, nullable=false)
     */
    private $emailfuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneFuncionario", type="string", length=15, nullable=false)
     */
    private $telefonefuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="funcionariocol", type="string", length=45, nullable=false)
     */
    private $funcionariocol;


}
