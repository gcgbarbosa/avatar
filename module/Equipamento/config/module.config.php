<?php
namespace Equipamento;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Equipamento\Controller\Equipamento' => 'Equipamento\Controller\EquipamentoController',
            'Equipamento\Controller\TipoEquipamento' => 'Equipamento\Controller\TipoEquipamentoController',
            'Equipamento\Controller\Tombo' => 'Equipamento\Controller\TomboController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'equipamento' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/equipamento',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Equipamento\Controller\Equipamento',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+',
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => '1'
                            ),
                        ),
                    ),
                ),
            ),
            'tipoequipamento' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tipo-equipamento',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Equipamento\Controller\TipoEquipamento',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+',
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => '1'
                            ),
                        ),
                    ),
                ),
            ),
            'tombo' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tombo[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Equipamento\Controller\Tombo',
                        'action'     => 'index',
                    ),
                ),
                
            ),
        ),
    ),     

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'equipamento/equipamento/index' => __DIR__ . '/../view',
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

