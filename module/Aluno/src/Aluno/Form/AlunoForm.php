<?php
namespace Aluno\Form;

use Zend\Form\Form;

class AlunoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('aluno');
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomeAluno',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nome: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'emailAluno',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'E-mail: ',
            ),
        ));

        $this->add(array(
            'name' => 'telefoneAluno',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Telofone: ',
            ),
        ));

        $this->add(array(
            'name' => 'matriculaAluno',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Matricula: ',
            ),
        ));

        $this->add(array(
            'name' => 'bolsista',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Bolsista: ',
            ),
        ));

        $this->add(array(
            'name' => 'dataNasc',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Data de Nascimento: ',
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
