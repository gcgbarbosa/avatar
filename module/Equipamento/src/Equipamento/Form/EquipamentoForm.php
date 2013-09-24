<?php
namespace Equipamento\Form;

use Zend\Form\Form;

class EquipamentoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('album');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Title',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'artist',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Artist',
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
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
