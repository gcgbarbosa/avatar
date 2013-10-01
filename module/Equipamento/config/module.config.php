<?php
namespace Equipamento;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Equipamento\Controller\Equipamento' => 'Equipamento\Controller\EquipamentoController',
            'Equipamento\Controller\TipoEquipamento' => 'Equipamento\Controller\TipoEquipamentoController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'equipamento' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/equipamento[/:action][/:tombo]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'tombo'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Equipamento\Controller\Equipamento',
                        'action'     => 'index',
                    ),
                ),

            ),
            'tipoequipamento' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tipo-equipamento[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Equipamento\Controller\TipoEquipamento',
                        'action'     => 'index',
                    ),
                ),
                
            ),
        ),
    ),     

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'equipamento' => __DIR__ . '/../view',
        ),
    ),

    // Doctrine configuration
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),

);

