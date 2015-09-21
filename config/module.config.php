<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoDomPdf\Controller\Settings' => 'UthandoDomPdf\Mvc\Controller\Settings',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'DomPdfOptionsFieldSet' => 'UthandoDomPdf\Form\DomPdfOptionsFieldSet',
            'PdfOptionsFieldSet'    => 'UthandoDomPdf\Form\PdfOptionsFieldSet',
            'DomPdfSettings'        => 'UthandoDomPdf\Form\DomPdfSettings',
        ],
    ],
    'service_manager' => [
        'shared' => [
            /**
             * DOMPDF itself has issues rendering twice in a row so we force a
             * new instance to be created.
             */
            'DomPdf' => false
        ],
        'factories' => [
            'DomPdf'            => 'UthandoDomPdf\Service\DomPdfFactory',
            'DomPdfOptions'     => 'UthandoDomPdf\Service\DomPdfOptionsFactory',
            'PdfModel'          => 'UthandoDomPdf\Service\PdfModelFactory',
            'ViewPdfRenderer'   => 'UthandoDomPdf\Mvc\Service\ViewPdfRendererFactory',
            'ViewPdfStrategy'   => 'UthandoDomPdf\Mvc\Service\ViewPdfStrategyFactory',
        ]
    ],
    'view_manager' => [
        'strategies' => [
            'ViewPdfStrategy'
        ],
        'template_map' => include __DIR__  .'/../template_map.php',
    ],
];
