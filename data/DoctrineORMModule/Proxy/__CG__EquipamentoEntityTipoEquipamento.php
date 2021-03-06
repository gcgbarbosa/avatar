<?php

namespace DoctrineORMModule\Proxy\__CG__\Equipamento\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TipoEquipamento extends \Equipamento\Entity\TipoEquipamento implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'inputFilter', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'idtipoequipamento', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'nometipoequipamento', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'descricaotipoequipamento');
        }

        return array('__isInitialized__', 'inputFilter', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'idtipoequipamento', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'nometipoequipamento', '' . "\0" . 'Equipamento\\Entity\\TipoEquipamento' . "\0" . 'descricaotipoequipamento');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TipoEquipamento $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdtipoequipamento()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdtipoequipamento();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdtipoequipamento', array());

        return parent::getIdtipoequipamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setNometipoequipamento($nometipoequipamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNometipoequipamento', array($nometipoequipamento));

        return parent::setNometipoequipamento($nometipoequipamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getNometipoequipamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNometipoequipamento', array());

        return parent::getNometipoequipamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricaotipoequipamento($descricaotipoequipamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricaotipoequipamento', array($descricaotipoequipamento));

        return parent::setDescricaotipoequipamento($descricaotipoequipamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescricaotipoequipamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricaotipoequipamento', array());

        return parent::getDescricaotipoequipamento();
    }

    /**
     * {@inheritDoc}
     */
    public function getArrayCopy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArrayCopy', array());

        return parent::getArrayCopy();
    }

    /**
     * {@inheritDoc}
     */
    public function populate($data = array (
))
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'populate', array($data));

        return parent::populate($data);
    }

    /**
     * {@inheritDoc}
     */
    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInputFilter', array($inputFilter));

        return parent::setInputFilter($inputFilter);
    }

    /**
     * {@inheritDoc}
     */
    public function getInputFilter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInputFilter', array());

        return parent::getInputFilter();
    }

}
