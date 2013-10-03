<?php

namespace DoctrineORMModule\Proxy\__CG__\Professor\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Departamento extends \Professor\Entity\Departamento implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getIddepartamento()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["iddepartamento"];
        }
        $this->__load();
        return parent::getIddepartamento();
    }

    public function setNomedepartamento($nomedepartamento)
    {
        $this->__load();
        return parent::setNomedepartamento($nomedepartamento);
    }

    public function getNomedepartamento()
    {
        $this->__load();
        return parent::getNomedepartamento();
    }

    public function setDescricaodepartamento($descricaodepartamento)
    {
        $this->__load();
        return parent::setDescricaodepartamento($descricaodepartamento);
    }

    public function getDescricaodepartamento()
    {
        $this->__load();
        return parent::getDescricaodepartamento();
    }

    public function getProfessorDepartamento()
    {
        $this->__load();
        return parent::getProfessorDepartamento();
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
        return array('__isInitialized__', 'iddepartamento', 'nomedepartamento', 'descricaodepartamento', 'professordepartamento');
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