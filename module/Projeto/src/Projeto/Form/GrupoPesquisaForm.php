<?php
namespace Projeto\Form;

use Zend\Form\Form;

class GrupoPesquisaForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('grupopesquisa');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'idGrupoPesquisa',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomeGrupoPesquisa',
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
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'pesquisadorresponsavel',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label'          => 'Pesquisador Responsável: ',
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
                'object_manager' => $name,
                'target_class'   => 'Sala\Entity\Sala',
                'property'       => 'nome',
                'empty_option'   => '--- Escolha a Sala ---',
            ),
        ));
        $this->add(array(
            'name' => 'linhaPesquisa',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Linha de Pesquisa: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'areasGrupoPesquisa',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Áreas: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        $this->add(array(
            'name' => 'objetivoGeral',
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
