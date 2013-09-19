<?php
namespace Professor\Form;

use Zend\Form\Form;

class ProfessorForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('professor');
        
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
            'name' => 'matriculaprofessor',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Matricula do professor: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomeprofessor',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Nome do professor: ',
            ),
        ));

        $this->add(array(
            'name' => 'emailprofessor',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'E-mail: ',
            ),
        ));

        $this->add(array(
            'name' => 'telefoneprofessor',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Telefone: ',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'departamentodepartamento',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Nome departamento: ',
                'object_manager' => $em,
                'target_class'   => 'Professor\Entity\Departamento',
                'property'       => 'nomedepartamento',
                'empty_option'   => '--- Departamento ---',
            ),
        ));


        $this->add(array(
            'name' => 'areadeatuacao',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Area de atuação: ',
            ),
        ));

        $this->add(array(
            'name' => 'formacao',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Formação: ',
            ),
        ));

        $this->add(array(
            'name' => 'titulacao',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Titualação: ',
            ),
        ));

        $this->add(array(
            'name' => 'classe',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Classe: ',
            ),
        ));

        $this->add(array(
            'name' => 'regimedetrabalho',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Regime de Trablho: ',
            ),
        ));

        $this->add(array(
            'name' => 'tipovinculo',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Tipo de vinculo: ',
            ),
        ));

        $this->add(array(
            'name' => 'datanasc',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Data de nascimento: ',
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
