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
            'name' => 'idreservasala',
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
            'name' => 'datainicio',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
                'id' => 'datainicio',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Data de Início: ',
            ),
        ));

        $this->add(array(
            'name' => 'datafim',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
                'id' => 'datafim',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Data do Fim: ',
            ),
        ));
        
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'salasala',
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
            'name' => 'professorprofessor',
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
                'property'       => 'nomefuncionario',
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
