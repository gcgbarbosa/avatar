<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professor
 *
 * @ORM\Table(name="professor")
 * @ORM\Entity
 */
class Professor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProfessor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculaProfessor", type="string", length=10, nullable=true)
     */
    private $matriculaprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeProfessor", type="string", length=100, nullable=false)
     */
    private $nomeprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="emailProfessor", type="string", length=45, nullable=true)
     */
    private $emailprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneProfessor", type="string", length=15, nullable=true)
     */
    private $telefoneprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="areaDeAtuacao", type="string", length=45, nullable=false)
     */
    private $areadeatuacao;

    /**
     * @var string
     *
     * @ORM\Column(name="formacao", type="string", length=45, nullable=false)
     */
    private $formacao;

    /**
     * @var string
     *
     * @ORM\Column(name="titulacao", type="string", length=45, nullable=false)
     */
    private $titulacao;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=45, nullable=false)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="regimeDeTrabalho", type="string", length=45, nullable=false)
     */
    private $regimedetrabalho;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoVinculo", type="string", length=45, nullable=false)
     */
    private $tipovinculo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", nullable=true)
     */
    private $datanasc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Projeto", inversedBy="professorprofessor")
     * @ORM\JoinTable(name="professor_has_projeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="professor_idProfessor", referencedColumnName="idProfessor")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Projeto_idProjeto", referencedColumnName="idProjeto")
     *   }
     * )
     */
    private $projetoprojeto;

    /**
     * @var \Application\Entity\Departamento
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_idDepartamento", referencedColumnName="idDepartamento")
     * })
     */
    private $departamentodepartamento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projetoprojeto = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
