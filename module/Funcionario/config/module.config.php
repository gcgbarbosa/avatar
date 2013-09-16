<?php
namespace Funcionario;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Funcionario\Controller\Funcionario' => 'Funcionario\Controller\FuncionarioController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'funcionario' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/funcionario[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Funcionario\Controller\Funcionario',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'funcionario' => __DIR__ . '/../view',
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

