<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ocorrencia
 *
 * @ORM\Table(name="ocorrencia")
 * @ORM\Entity
 */
class Ocorrencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idocorrencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idocorrencia;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text", nullable=false)
     */
    private $observacao;

    /**
     * @var \Application\Entity\ReservaSala
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\ReservaSala")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reserva_sala_idreservaSala", referencedColumnName="idreservaSala")
     * })
     */
    private $reservaSalareservasala;

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
