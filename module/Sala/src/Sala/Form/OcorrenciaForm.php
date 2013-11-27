<?php
namespace Sala\Form;

use Zend\Form\Form;

class OcorrenciaForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('ocorrencia');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idocorrencia',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'observacao',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Observação: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'reservaSalareservasala',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Sala Reservada: ',
                'object_manager' => $em,
                'target_class'   => 'Sala\Entity\ReservaSala',
                'property'       => 'salasala',
                'empty_option'   => '--- Sala Reservada ---',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'funcionariofuncionario',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Funcionário: ',
                'object_manager' => $em,
                'target_class'   => 'Funcionario\Entity\Funcionario',
                'property'       => 'funcionariofuncionario',
                'empty_option'   => '--- Funcionário ---',
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
