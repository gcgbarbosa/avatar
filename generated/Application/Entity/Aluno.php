<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno")
 * @ORM\Entity
 */
class Aluno
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idaluno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeAluno", type="string", length=75, nullable=false)
     */
    private $nomealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="emailAluno", type="string", length=45, nullable=false)
     */
    private $emailaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneAluno", type="string", length=45, nullable=false)
     */
    private $telefonealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculaAluno", type="string", length=45, nullable=false)
     */
    private $matriculaaluno;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bolsista", type="boolean", nullable=false)
     */
    private $bolsista;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", nullable=false)
     */
    private $datanasc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Projeto", inversedBy="alunoaluno")
     * @ORM\JoinTable(name="aluno_has_projeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="aluno_idaluno", referencedColumnName="idaluno")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Projeto_idProjeto", referencedColumnName="idProjeto")
     *   }
     * )
     */
    private $projetoprojeto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projetoprojeto = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
