<?php
namespace Sala\Form;

use Zend\Form\Form;

class ReservaSalaForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('reservasala');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idreservaSala',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'objetivo',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Objetivo: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'dataInicio',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
                'id' => 'dataInicio'
            ),
            'options' => array(
                'label' => 'Hora do Início: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'dataFim',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
                'id' => 'dataFim'
            ),
            'options' => array(
                'label' => 'Hora do Final: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'dataReserva',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
                'id' => 'dataReserva'
            ),
            'options' => array(
                'label' => 'Dia: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'salaReserva',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Sala: ',
                'object_manager' => $em,
                'target_class'   => 'Sala\Entity\Sala',
                'property'       => 'nome',
                'empty_option'   => '--- Sala ---',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'funcionarioReserva',
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
                'property'       => 'nomefuncionario',
                'empty_option'   => '--- Funcionario ---',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'professorReserva',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Professor: ',
                'object_manager' => $em,
                'target_class'   => 'Professor\Entity\Professor',
                'property'       => 'nomeprofessor',
                'empty_option'   => '--- Professor ---',
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
