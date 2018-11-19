<?php

use UthandoDomPdf\Controller\SettingsController;

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                SettingsController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                SettingsController::class
            ],
        ],
    ],
];
