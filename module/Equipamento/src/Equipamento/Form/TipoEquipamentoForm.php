<?php
namespace Equipamento\Form;

use Zend\Form\Form;

class TipoEquipamentoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('tipoequipamento');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        
        $this->add(array(
            'name' => 'idtipoequipamento',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'nometipoequipamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class'  => 'col-lg-2 control-label'
                ),
                'label' => 'Nome: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'descricaotipoequipamento',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Descrição: ',
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
