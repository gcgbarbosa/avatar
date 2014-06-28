<?php
namespace Funcionario;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Funcionario\Controller\Funcionario' => 'Funcionario\Controller\FuncionarioController',
            'Funcionario\Controller\Frequencia' => 'Funcionario\Controller\FrequenciaController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'funcionario' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/funcionario',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Funcionario\Controller\Funcionario',
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
            'frequencia' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/frequencia',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Funcionario\Controller\Frequencia',
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
        ),
    ),   


    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'funcionario/funcionario/index' => __DIR__ . '/../view',
            'funcionario/frequencia/index' => __DIR__ . '/../view'
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

