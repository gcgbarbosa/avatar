<?php

namespace DoctrineORMModule\Proxy\__CG__\Projeto\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Projeto extends \Projeto\Entity\Projeto implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getIdprojeto()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["idprojeto"];
        }
        $this->__load();
        return parent::getIdprojeto();
    }

    public function setTitulo($titulo)
    {
        $this->__load();
        return parent::setTitulo($titulo);
    }

    public function getTitulo()
    {
        $this->__load();
        return parent::getTitulo();
    }

    public function setObjetivogeral($objetivogeral)
    {
        $this->__load();
        return parent::setObjetivogeral($objetivogeral);
    }

    public function getObjetivogeral()
    {
        $this->__load();
        return parent::getObjetivogeral();
    }

    public function setObjetivoespec($objetivoespec)
    {
        $this->__load();
        return parent::setObjetivoespec($objetivoespec);
    }

    public function getObjetivoespec()
    {
        $this->__load();
        return parent::getObjetivoespec();
    }

    public function setResultadosesperados($resultadosesperados)
    {
        $this->__load();
        return parent::setResultadosesperados($resultadosesperados);
    }

    public function getResultadosesperados()
    {
        $this->__load();
        return parent::getResultadosesperados();
    }

    public function setFinaciamento($finaciamento)
    {
        $this->__load();
        return parent::setFinaciamento($finaciamento);
    }

    public function getFinaciamento()
    {
        $this->__load();
        return parent::getFinaciamento();
    }

    public function setFontefinaciamento($fontefinaciamento)
    {
        $this->__load();
        return parent::setFontefinaciamento($fontefinaciamento);
    }

    public function getFontefinaciamento()
    {
        $this->__load();
        return parent::getFontefinaciamento();
    }

    public function addAlunoaluno(\Aluno\Entity\Aluno $alunoaluno)
    {
        $this->__load();
        return parent::addAlunoaluno($alunoaluno);
    }

    public function removeAlunoaluno(\Aluno\Entity\Aluno $alunoaluno)
    {
        $this->__load();
        return parent::removeAlunoaluno($alunoaluno);
    }

    public function getAlunoaluno()
    {
        $this->__load();
        return parent::getAlunoaluno();
    }

    public function addProfessorprofessor(\Professor\Entity\Professor $professorprofessor)
    {
        $this->__load();
        return parent::addProfessorprofessor($professorprofessor);
    }

    public function removeProfessorprofessor(\Professor\Entity\Professor $professorprofessor)
    {
        $this->__load();
        return parent::removeProfessorprofessor($professorprofessor);
    }

    public function getProfessorprofessor()
    {
        $this->__load();
        return parent::getProfessorprofessor();
    }

    public function setProfessorcoordenador(\Professor\Entity\Professor $professorcoordenador = NULL)
    {
        $this->__load();
        return parent::setProfessorcoordenador($professorcoordenador);
    }

    public function getProfessorcoordenador()
    {
        $this->__load();
        return parent::getProfessorcoordenador();
    }

    public function getArrayCopy()
    {
        $this->__load();
        return parent::getArrayCopy();
    }

    public function populate($data = array (
))
    {
        $this->__load();
        return parent::populate($data);
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter)
    {
        $this->__load();
        return parent::setInputFilter($inputFilter);
    }

    public function getInputFilter()
    {
        $this->__load();
        return parent::getInputFilter();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'idprojeto', 'titulo', 'objetivogeral', 'objetivoespec', 'resultadosesperados', 'finaciamento', 'fontefinaciamento', 'alunoaluno', 'professorprofessor', 'professorcoordenador');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}