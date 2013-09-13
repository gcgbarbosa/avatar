<?php
namespace Aluno;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Aluno\Controller\Aluno' => 'Aluno\Controller\AlunoController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'aluno' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/aluno[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Aluno\Controller\Aluno',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'aluno' => __DIR__ . '/../view',
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

