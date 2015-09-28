<?php
return [
    'modules' => [
        'Application',
        'UthandoCommon',
        'UthandoDomPdf',
        'TwbBundle',
    ],
    'module_listener_options' => [
        'config_cache_enabled' => false,
        'cache_dir'            => 'data/cache',
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
        'module_paths' => [
            './vendor',
            './devmodules',
            './module'
        ],
    ],
    'service_manager' => [
        'use_defaults' => true,
        'invokables' => [
            'ModuleRouteListener' => 'Zend\Mvc\ModuleRouteListener',
        ],
    ],
];