<?php
namespace Aluno\Form;

use Zend\Form\Form;

class AlunoForm extends Form
{
    public function __construct($name = null)
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
            ),
        ));

        $this->add(array(
            'name' => 'telefonealuno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Telofone: ',
            ),
        ));

        $this->add(array(
            'name' => 'matriculaaluno',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Matricula: ',
            ),
        ));

        $this->add(array(
            'name' => 'bolsista',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Bolsista: ',
            ),
        ));

        $this->add(array(
            'name' => 'datanasc',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Data de Nascimento: ',
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
