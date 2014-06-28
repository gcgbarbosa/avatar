<?php
namespace Funcionario\Form;

use Zend\Form\Form;

class FrequenciaForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('frequencia');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idfrequencia',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'horarioentrada',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
                //'id' => 'horarioentrada'
            ),
            'options' => array(
                'label' => 'Hora de Entrada: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'horariosaida',
            'attributes' => array(
                'class' => 'form-control',
                'type'  => 'text',
              //  'id' => 'horariosaida'
            ),
            'options' => array(
                'label' => 'Hora de Saída: ',
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'funcionariofuncionario',
            'attributes' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label'          => 'Funcionário: ',
                'object_manager' => $em,
                'target_class'   => 'Funcionario\Entity\Funcionario',
                'property'       => 'nomefuncionario',
                'empty_option'   => '--- Funcionário ---',
            ),
        ));

        $this->add(array(
            'name' => 'dataFrequencia',
            'attributes' => array(
                'type'  => 'Zend\Form\Element\DateTime',
                'class' => 'form-control',
               // 'id' => 'dataFrequencia'
            ),
            'options' => array(
                'label' => 'Dia: ',
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
