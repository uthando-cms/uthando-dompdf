<?php

return [
    'view_manager' => [
        'strategies' => [
            'ViewPdfStrategy'
        ]
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
];
