<?php
namespace Equipamento\Form;

use Zend\Form\Form;

class TomboForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('sala');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idTombo',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'numeroTombo',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Tombo: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'equipamentoequipamento',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label'          => 'Equipamento: ',
                'object_manager' => $em,
                'target_class'   => 'Equipamento\Entity\Equipamento',
                'property'       => 'Equipamento',
                'empty_option'   => '--- Equipamento ---',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
    }
}
