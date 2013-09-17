<?php
namespace Projeto\Form;

use Zend\Form\Form;

class ProjetoForm extends Form
{
    public function __construct($name = null)
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
                'label' => 'Título',
            ),
        ));
        
        $this->add(array(
            'name' => 'objetivoGeral',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Objetivo Geral',
            ),
        ));

        $this->add(array(
            'name' => 'professor_idCoordenador',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Id do Professor',
            ),
        ));

        $this->add(array(
            'name' => 'objetivoEspec',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Objetivo Específico',
            ),
        ));

        $this->add(array(
            'name' => 'resultadosEsperados',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Resultados Esperados',
            ),
        ));

        $this->add(array(
            'name' => 'financiamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Financiamento',
            ),
        ));

        $this->add(array(
            'name' => 'fonteFinanciamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Fonte de Financiamento',
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
