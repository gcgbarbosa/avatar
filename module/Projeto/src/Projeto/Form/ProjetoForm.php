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
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'grupoPesquisaProjeto',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label'          => 'Grupo de Pesquisa: ',
                'object_manager' => $name,
                'target_class'   => 'Projeto\Entity\GrupoPesquisa',
                'property'       => 'nomeGrupoPesquisa',
                'empty_option'   => '--- Grupo de Pesquisa ---',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
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
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
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
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'professorcoordenador',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label'          => 'Professor Responsável: ',
                'object_manager' => $name,
                'target_class'   => 'Professor\Entity\Professor',
                'property'       => 'nomeprofessor',
                'empty_option'   => '--- Professor ---',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
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
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
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
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'finaciamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Financiamento: ',
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
            'name' => 'fontefinaciamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Fonte de Financiamento: ',
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
