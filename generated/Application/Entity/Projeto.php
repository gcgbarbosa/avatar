<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projeto
 *
 * @ORM\Table(name="projeto")
 * @ORM\Entity
 */
class Projeto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProjeto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprojeto;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=70, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoGeral", type="text", nullable=false)
     */
    private $objetivogeral;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivoEspec", type="text", nullable=true)
     */
    private $objetivoespec;

    /**
     * @var string
     *
     * @ORM\Column(name="resultadosEsperados", type="text", nullable=true)
     */
    private $resultadosesperados;

    /**
     * @var boolean
     *
     * @ORM\Column(name="finaciamento", type="boolean", nullable=false)
     */
    private $finaciamento;

    /**
     * @var string
     *
     * @ORM\Column(name="fonteFinaciamento", type="string", length=50, nullable=true)
     */
    private $fontefinaciamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Aluno", mappedBy="projetoprojeto")
     */
    private $alunoaluno;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Professor", mappedBy="projetoprojeto")
     */
    private $professorprofessor;

    /**
     * @var \Application\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idCoordenador", referencedColumnName="idProfessor")
     * })
     */
    private $professorcoordenador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alunoaluno = new \Doctrine\Common\Collections\ArrayCollection();
        $this->professorprofessor = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
