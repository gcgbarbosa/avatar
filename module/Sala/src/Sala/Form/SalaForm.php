<?php
namespace Sala\Form;

use Zend\Form\Form;

class SalaForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('sala');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idsala',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nome',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nome da Sala: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'locallocal',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label'          => 'Local: ',
                'object_manager' => $name,
                'target_class'   => 'Sala\Entity\Local',
                'property'       => 'nomelocal',
                'empty_option'   => '--- Local ---',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'class' => 'btn btn-default',
                'type'  => 'submit',
                'value' => 'Salvar',
                'id' => 'submitbutton',
            ),
        ));
    }
}
