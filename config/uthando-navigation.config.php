<?php

return [
    'navigation' => [
        'admin' => [
            'dompdf' => [
                'label' => 'DomPdf',
                'pages' => [
                    'dompdf-settings' => [
                        'label' => 'Settings',
                        'action' => 'index',
                        'route' => 'admin/dompdf',
                        'resource' => 'menu:admin',
                    ],
                ],
                'route'     => 'admin/dompdf',
                'resource'  => 'menu:admin'
            ],
        ],
    ],
];
