<?php
namespace Professor;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Professor\Controller\Professor' => 'Professor\Controller\ProfessorController',
            'Professor\Controller\Departamento' => 'Professor\Controller\DepartamentoController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'professor' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/professor[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Professor\Controller\Professor',
                        'action'     => 'index',
                    ),
                ),

            ),
            'departamento' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/departamento[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Professor\Controller\Departamento',
                        'action'     => 'index',
                    ),
                ),
                
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'professor' => __DIR__ . '/../view',
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

