<?php
namespace Funcionario\Form;

use Zend\Form\Form;

class FuncionarioForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('funcionario');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idfuncionario',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomefuncionario',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nome: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'emailfuncionario',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'E-mail: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'telefonefuncionario',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'telefonefuncionario',
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Telefone: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'datanasc',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
                'id' => 'datanasc'
            ),
            'options' => array(
                'label' => 'Data de Nascimento: ',
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
