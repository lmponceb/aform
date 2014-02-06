<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Formulario\Controller\Formulario' => 'Formulario\Controller\FormularioController',
        ),
    ),
    'validators' => array(
        'invokables' => array(
            'CedulaValidator' => 'Formulario\Form\CedulaValidator'
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'formulario' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/formulario[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Formulario\Controller\Formulario',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ), 
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            'formulario' => __DIR__ . '/../view',
        ),
    ),

);