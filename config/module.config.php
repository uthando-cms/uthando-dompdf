<?php

use UthandoDomPdf\Form\DomPdfOptionsFieldSet;
use UthandoDomPdf\Form\DomPdfSettings;
use UthandoDomPdf\Form\PdfOptionsFieldSet;
use UthandoDomPdf\Form\PdfTextLineFieldSet;
use UthandoDomPdf\Form\PdfTextLineFontFieldSet;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'invokables' => [
            'UthandoDomPdf\Controller\Settings' => 'UthandoDomPdf\Mvc\Controller\Settings',
        ],
    ],
    'form_elements' => [
        'factories' => [
            DomPdfOptionsFieldSet::class    => InvokableFactory::class,
            DomPdfSettings::class           => InvokableFactory::class,
            PdfOptionsFieldSet::class       => InvokableFactory::class,
            PdfTextLineFieldSet::class      => InvokableFactory::class,
            PdfTextLineFontFieldSet::class  => InvokableFactory::class,
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
