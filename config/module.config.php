<?php

return [
    'controllers' => [
        'invokables' => [
            'UthandoDomPdf\Controller\Settings' => 'UthandoDomPdf\Mvc\Controller\Settings',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'DomPdfOptionsFieldSet'     => 'UthandoDomPdf\Form\DomPdfOptionsFieldSet',
            'DomPdfSettings'            => 'UthandoDomPdf\Form\DomPdfSettings',
            'PdfOptionsFieldSet'        => 'UthandoDomPdf\Form\PdfOptionsFieldSet',
            'PdfTextLineFieldSet'       => 'UthandoDomPdf\Form\PdfTextLineFieldSet',
            'PdfTextLineFontFieldSet'   => 'UthandoDomPdf\Form\PdfTextLineFontFieldSet',
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
     'view_helpers' => [
        'invokables' => [
            'PdfTextLineFormCollection' => 'UthandoDomPdf\Form\View\Helper\PdfTextLineFormCollection',
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewPdfStrategy'
        ],
        'template_map' => include __DIR__  .'/../template_map.php',
    ],
];
