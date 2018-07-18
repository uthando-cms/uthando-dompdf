<?php

use Dompdf\Dompdf;
use UthandoDomPdf\Form\DomPdfOptionsFieldSet;
use UthandoDomPdf\Form\DomPdfSettings;
use UthandoDomPdf\Form\PdfOptionsFieldSet;
use UthandoDomPdf\Form\PdfTextLineFieldSet;
use UthandoDomPdf\Form\PdfTextLineFontFieldSet;
use UthandoDomPdf\Form\View\Helper\PdfTextLineFormCollection;
use UthandoDomPdf\Mvc\Controller\SettingsController;
use UthandoDomPdf\Mvc\Service\ViewPdfRendererFactory;
use UthandoDomPdf\Mvc\Service\ViewPdfStrategyFactory;
use UthandoDomPdf\Options\DomPdfOptions;
use UthandoDomPdf\Service\DomPdfFactory;
use UthandoDomPdf\Service\DomPdfOptionsFactory;
use UthandoDomPdf\Service\PdfModelFactory;
use UthandoDomPdf\View\Model\PdfModel;
use UthandoDomPdf\View\Renderer\PdfRenderer;
use UthandoDomPdf\View\Strategy\PdfStrategy;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'invokables' => [
            SettingsController::class => SettingsController::class,
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
            Dompdf::class => false
        ],
        'factories' => [
            Dompdf::class           => DomPdfFactory::class,
            DomPdfOptions::class    => DomPdfOptionsFactory::class,
            PdfModel::class         => PdfModelFactory::class,
            PdfRenderer::class      => ViewPdfRendererFactory::class,
            PdfStrategy::class      => ViewPdfStrategyFactory::class,
        ]
    ],
    'view_helpers' => [
        'invokables' => [
            PdfTextLineFormCollection::class => PdfTextLineFormCollection::class,
        ],
    ],
    'view_manager' => [
        'strategies' => [
            PdfStrategy::class
        ],
        'template_map' => include __DIR__  .'/../template_map.php',
    ],
];
