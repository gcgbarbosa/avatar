<?php
namespace Aluno\Form;

use Zend\Form\Form;

class AlunoForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('aluno');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idaluno',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomealuno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Nome: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'emailaluno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'E-mail: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'telefonealuno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
                'id' => 'telefonealuno',
            ),
            'options' => array(
                'label' => 'Telofone: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'matriculaaluno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Matrícula: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'cursoAluno',
            'attributes' => array(
                'class' => 'form-control',
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
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'bolsista',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Bolsista: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'value_options' => array(
                    'true' => 'Sim',
                    'false' => 'Não',
                ),
            ),
            'attributes' => array(
                //'value' => '1' //set checked to '1'
            )
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
