<?php
namespace Projeto;

return array(

    // Controllers in this module
    'controllers' => array(
        'invokables' => array(
            'Projeto\Controller\Projeto' => 'Projeto\Controller\ProjetoController',
            'Projeto\Controller\GrupoPesquisa' => 'Projeto\Controller\GrupoPesquisaController',
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'projeto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/projeto[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Projeto\Controller\Projeto',
                        'action'     => 'index',
                    ),
                ),
            ),
            'grupopesquisa' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/grupo-pesquisa[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Projeto\Controller\GrupoPesquisa',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'projeto/projeto/index' => __DIR__ . '/../view',
            'projeto/grupo-pesquisa/index' => __DIR__ . '/../view',
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

