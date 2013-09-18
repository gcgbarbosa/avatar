<?php
namespace Projeto\Form;

use Zend\Form\Form;

class ProjetoForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('projeto');
        
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
            'name' => 'titulo',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Título: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'objetivogeral',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Objetivo Geral: ',
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'professor',
            'options' => array(
                'label'          => 'Nome departamento: ',
                'object_manager' => $em,
                'target_class'   => 'Professor\Entity\Professor',
                'property'       => 'nomeprofessor',
                'empty_option'   => '--- Professor ---',
            ),
        ));

        $this->add(array(
            'name' => 'objetivoespec',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Objetivo Específico: ',
            ),
        ));

        $this->add(array(
            'name' => 'resultadosesperados',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Resultados Esperados: ',
            ),
        ));

        $this->add(array(
            'name' => 'financiamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Financiamento: ',
            ),
        ));

        $this->add(array(
            'name' => 'fontefinaciamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Fonte de Financiamento: ',
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
