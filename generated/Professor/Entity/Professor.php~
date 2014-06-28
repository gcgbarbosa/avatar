<?php

namespace Professor\Entity;

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
     * @ORM\Column(name="idProfessor", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculaProfessor", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $matriculaprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeProfessor", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nomeprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="emailProfessor", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $emailprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneProfessor", type="string", length=15, precision=0, scale=0, nullable=true, unique=false)
     */
    private $telefoneprofessor;

    /**
     * @var string
     *
     * @ORM\Column(name="areaDeAtuacao", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $areadeatuacao;

    /**
     * @var string
     *
     * @ORM\Column(name="formacao", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $formacao;

    /**
     * @var string
     *
     * @ORM\Column(name="titulacao", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titulacao;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="regimeDeTrabalho", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $regimedetrabalho;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoVinculo", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tipovinculo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNasc", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datanasc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Projeto\Entity\Projeto", inversedBy="professorprofessor")
     * @ORM\JoinTable(name="professor_has_projeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="professor_idProfessor", referencedColumnName="idProfessor", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Projeto_idProjeto", referencedColumnName="idProjeto", nullable=true)
     *   }
     * )
     */
    private $projetoprojeto;

    /**
     * @var \Professor\Entity\Departamento
     *
     * @ORM\ManyToOne(targetEntity="Professor\Entity\Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_idDepartamento", referencedColumnName="idDepartamento", nullable=true)
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
    
    /**
     * Get idprofessor
     *
     * @return integer 
     */
    public function getIdprofessor()
    {
        return $this->idprofessor;
    }

    /**
     * Set matriculaprofessor
     *
     * @param string $matriculaprofessor
     * @return Professor
     */
    public function setMatriculaprofessor($matriculaprofessor)
    {
        $this->matriculaprofessor = $matriculaprofessor;
    
        return $this;
    }

    /**
     * Get matriculaprofessor
     *
     * @return string 
     */
    public function getMatriculaprofessor()
    {
        return $this->matriculaprofessor;
    }

    /**
     * Set nomeprofessor
     *
     * @param string $nomeprofessor
     * @return Professor
     */
    public function setNomeprofessor($nomeprofessor)
    {
        $this->nomeprofessor = $nomeprofessor;
    
        return $this;
    }

    /**
     * Get nomeprofessor
     *
     * @return string 
     */
    public function getNomeprofessor()
    {
        return $this->nomeprofessor;
    }

    /**
     * Set emailprofessor
     *
     * @param string $emailprofessor
     * @return Professor
     */
    public function setEmailprofessor($emailprofessor)
    {
        $this->emailprofessor = $emailprofessor;
    
        return $this;
    }

    /**
     * Get emailprofessor
     *
     * @return string 
     */
    public function getEmailprofessor()
    {
        return $this->emailprofessor;
    }

    /**
     * Set telefoneprofessor
     *
     * @param string $telefoneprofessor
     * @return Professor
     */
    public function setTelefoneprofessor($telefoneprofessor)
    {
        $this->telefoneprofessor = $telefoneprofessor;
    
        return $this;
    }

    /**
     * Get telefoneprofessor
     *
     * @return string 
     */
    public function getTelefoneprofessor()
    {
        return $this->telefoneprofessor;
    }

    /**
     * Set areadeatuacao
     *
     * @param string $areadeatuacao
     * @return Professor
     */
    public function setAreadeatuacao($areadeatuacao)
    {
        $this->areadeatuacao = $areadeatuacao;
    
        return $this;
    }

    /**
     * Get areadeatuacao
     *
     * @return string 
     */
    public function getAreadeatuacao()
    {
        return $this->areadeatuacao;
    }

    /**
     * Set formacao
     *
     * @param string $formacao
     * @return Professor
     */
    public function setFormacao($formacao)
    {
        $this->formacao = $formacao;
    
        return $this;
    }

    /**
     * Get formacao
     *
     * @return string 
     */
    public function getFormacao()
    {
        return $this->formacao;
    }

    /**
     * Set titulacao
     *
     * @param string $titulacao
     * @return Professor
     */
    public function setTitulacao($titulacao)
    {
        $this->titulacao = $titulacao;
    
        return $this;
    }

    /**
     * Get titulacao
     *
     * @return string 
     */
    public function getTitulacao()
    {
        return $this->titulacao;
    }

    /**
     * Set classe
     *
     * @param string $classe
     * @return Professor
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    
        return $this;
    }

    /**
     * Get classe
     *
     * @return string 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set regimedetrabalho
     *
     * @param string $regimedetrabalho
     * @return Professor
     */
    public function setRegimedetrabalho($regimedetrabalho)
    {
        $this->regimedetrabalho = $regimedetrabalho;
    
        return $this;
    }

    /**
     * Get regimedetrabalho
     *
     * @return string 
     */
    public function getRegimedetrabalho()
    {
        return $this->regimedetrabalho;
    }

    /**
     * Set tipovinculo
     *
     * @param string $tipovinculo
     * @return Professor
     */
    public function setTipovinculo($tipovinculo)
    {
        $this->tipovinculo = $tipovinculo;
    
        return $this;
    }

    /**
     * Get tipovinculo
     *
     * @return string 
     */
    public function getTipovinculo()
    {
        return $this->tipovinculo;
    }

    /**
     * Set datanasc
     *
     * @param \DateTime $datanasc
     * @return Professor
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
     * @param \Projeto\Entity\Projeto $projetoprojeto
     * @return Professor
     */
    public function addProjetoprojeto(\Projeto\Entity\Projeto $projetoprojeto)
    {
        $this->projetoprojeto[] = $projetoprojeto;
    
        return $this;
    }

    /**
     * Remove projetoprojeto
     *
     * @param \Projeto\Entity\Projeto $projetoprojeto
     */
    public function removeProjetoprojeto(\Projeto\Entity\Projeto $projetoprojeto)
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

    /**
     * Set departamentodepartamento
     *
     * @param \Professor\Entity\Departamento $departamentodepartamento
     * @return Professor
     */
    public function setDepartamentodepartamento(\Professor\Entity\Departamento $departamentodepartamento = null)
    {
        $this->departamentodepartamento = $departamentodepartamento;
    
        return $this;
    }

    /**
     * Get departamentodepartamento
     *
     * @return \Professor\Entity\Departamento 
     */
    public function getDepartamentodepartamento()
    {
        return $this->departamentodepartamento;
    }
}
