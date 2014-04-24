<?php
namespace Sala;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Sala\Controller\Sala' => 'Sala\Controller\SalaController',
            'Sala\Controller\Local' => 'Sala\Controller\LocalController',
            'Sala\Controller\ReservaSala' => 'Sala\Controller\ReservaSalaController',
            'Sala\Controller\Ocorrencia' => 'Sala\Controller\OcorrenciaController'
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'sala' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/sala[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Sala\Controller\Sala',
                        'action'     => 'index',
                    ),
                ),
            ),
            'local' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/local[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Sala\Controller\Local',
                        'action'     => 'index',
                    ),
                ),
            ),
            'ocorrencia' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ocorrencia[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Sala\Controller\Ocorrencia',
                        'action'     => 'index',
                    ),
                ),
            ),
            'reservasala' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/reserva-sala[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Sala\Controller\ReservaSala',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'sala/local/index' => __DIR__ . '/../view',
            'sala/sala/index' => __DIR__ . '/../view',
            'sala/reserva-sala/index' => __DIR__ . '/../view',
            'sala/ocorrencia/index' => __DIR__ . '/../view',
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

