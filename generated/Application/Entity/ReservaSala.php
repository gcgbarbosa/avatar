<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservaSala
 *
 * @ORM\Table(name="reserva_sala")
 * @ORM\Entity
 */
class ReservaSala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idreservaSala", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservasala;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="text", nullable=false)
     */
    private $objetivo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicio", type="datetime", nullable=false)
     */
    private $datainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="datetime", nullable=false)
     */
    private $datafim;

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
     * @var \Application\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idProfessor", referencedColumnName="idProfessor")
     * })
     */
    private $professorprofessor;

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
