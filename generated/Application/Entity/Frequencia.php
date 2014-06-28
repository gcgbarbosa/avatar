<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia")
 * @ORM\Entity
 */
class Frequencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFrequencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfrequencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horarioEntrada", type="datetime", nullable=false)
     */
    private $horarioentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horarioSaida", type="datetime", nullable=false)
     */
    private $horariosaida;

    /**
     * @var \Application\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_idFuncionario", referencedColumnName="idFuncionario")
     * })
     */
    private $funcionariofuncionario;


}
