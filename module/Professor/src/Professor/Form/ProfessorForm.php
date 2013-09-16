<?php
namespace Professor\Form;

use Zend\Form\Form;

class ProfessorForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('professor');
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'matriculaProfessor',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomeProfessor',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'emailProfessor',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'telefoneProfessor',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'departamento_idDepartamento',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'areaDeAtuacao',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'formacao',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'titulacao',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'classe',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'regimeDeTrabalho',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'tipoVinculo',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'dataNasc',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
