<?php
namespace Professor\Form;

use Zend\Form\Form;

class DepartamentoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('departamento');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'iddepartamento',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomedepartamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Nome: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'descricaodepartamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Descrição: ',
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
        $this->add(array(
            'name' => 'view',
            'attributes' => array(
                'class' => 'btn btn-default',
                'type'  => 'view',
                'value' => 'Voltar',
                'id' => 'viewbutton',
            ),
        ));
    }
}
