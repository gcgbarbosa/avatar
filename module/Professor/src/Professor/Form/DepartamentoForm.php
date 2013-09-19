<?php
namespace Professor\Form;

use Zend\Form\Form;

class DepartamentoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('departamento');
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
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
                'label' => 'Nome do departamento: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'descricaodepartamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Descrição do departamento: ',
            ),
        ));

        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Salvar',
                'id' => 'submitbutton',
            ),
        ));
    }
}
