<?php

namespace Aluno\Entity;

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
     * @ORM\Column(name="idaluno", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeAluno", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="emailAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $emailaluno;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $telefonealuno;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculaAluno", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $matriculaaluno;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bolsista", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $bolsista;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $datanasc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Projeto", inversedBy="alunoaluno")
     * @ORM\JoinTable(name="aluno_has_projeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="aluno_idaluno", referencedColumnName="idaluno", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Projeto_idProjeto", referencedColumnName="idProjeto", nullable=true)
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
    
    /**
     * Get idaluno
     *
     * @return integer 
     */
    public function getIdaluno()
    {
        return $this->idaluno;
    }

    /**
     * Set nomealuno
     *
     * @param string $nomealuno
     * @return Aluno
     */
    public function setNomealuno($nomealuno)
    {
        $this->nomealuno = $nomealuno;
    
        return $this;
    }

    /**
     * Get nomealuno
     *
     * @return string 
     */
    public function getNomealuno()
    {
        return $this->nomealuno;
    }

    /**
     * Set emailaluno
     *
     * @param string $emailaluno
     * @return Aluno
     */
    public function setEmailaluno($emailaluno)
    {
        $this->emailaluno = $emailaluno;
    
        return $this;
    }

    /**
     * Get emailaluno
     *
     * @return string 
     */
    public function getEmailaluno()
    {
        return $this->emailaluno;
    }

    /**
     * Set telefonealuno
     *
     * @param string $telefonealuno
     * @return Aluno
     */
    public function setTelefonealuno($telefonealuno)
    {
        $this->telefonealuno = $telefonealuno;
    
        return $this;
    }

    /**
     * Get telefonealuno
     *
     * @return string 
     */
    public function getTelefonealuno()
    {
        return $this->telefonealuno;
    }

    /**
     * Set matriculaaluno
     *
     * @param string $matriculaaluno
     * @return Aluno
     */
    public function setMatriculaaluno($matriculaaluno)
    {
        $this->matriculaaluno = $matriculaaluno;
    
        return $this;
    }

    /**
     * Get matriculaaluno
     *
     * @return string 
     */
    public function getMatriculaaluno()
    {
        return $this->matriculaaluno;
    }

    /**
     * Set bolsista
     *
     * @param boolean $bolsista
     * @return Aluno
     */
    public function setBolsista($bolsista)
    {
        $this->bolsista = $bolsista;
    
        return $this;
    }

    /**
     * Get bolsista
     *
     * @return boolean 
     */
    public function getBolsista()
    {
        return $this->bolsista;
    }

    /**
     * Set datanasc
     *
     * @param \DateTime $datanasc
     * @return Aluno
     */
    public function setDatanasc($datanasc)
    {
        $this->datanasc = $datanasc;
    
        return $this;
    }

    /**
     * Get datanasc
     *
     * @return \DateTime 
     */
    public function getDatanasc()
    {
        return $this->datanasc;
    }

    /**
     * Add projetoprojeto
     *
     * @param \Application\Entity\Projeto $projetoprojeto
     * @return Aluno
     */
    public function addProjetoprojeto(\Application\Entity\Projeto $projetoprojeto)
    {
        $this->projetoprojeto[] = $projetoprojeto;
    
        return $this;
    }

    /**
     * Remove projetoprojeto
     *
     * @param \Application\Entity\Projeto $projetoprojeto
     */
    public function removeProjetoprojeto(\Application\Entity\Projeto $projetoprojeto)
    {
        $this->projetoprojeto->removeElement($projetoprojeto);
    }

    /**
     * Get projetoprojeto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjetoprojeto()
    {
        return $this->projetoprojeto;
    }
}