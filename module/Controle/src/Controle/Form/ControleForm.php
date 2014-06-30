<?php
namespace Controle\Form;

use Zend\Form\Form;

class ControleForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('controle');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idControle',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'alunoControle',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'alunoControle',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Aluno: ',
                'object_manager' => $em,
                'target_class'   => 'Aluno\Entity\Aluno',
                'property'       => 'nomealuno',
                'empty_option'   => '--- Aluno ---',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'cursoControle',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'cursoControle',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Curso: ',
                'object_manager' => $em,
                'target_class'   => 'Curso\Entity\Curso',
                'property'       => 'nomeCurso',
                'empty_option'   => '--- Curso ---',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'salaControle',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'salaControle',
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
            'name' => 'responsavelControle',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'responsavelControle',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Responsável: ',
                'object_manager' => $em,
                'target_class'   => 'Professor\Entity\Professor',
                'property'       => 'nomeprofessor',
                'empty_option'   => '--- Professor ---',
            ),
        ));

        $this->add(array(
            'name' => 'objetivoControle',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
                'id' => 'objetivoControle',
            ),
            'options' => array(
                'label' => 'Objetivo: ',
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
