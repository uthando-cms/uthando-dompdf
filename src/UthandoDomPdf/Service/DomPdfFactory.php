<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Service;

use UthandoDomPdf\Options\DomPdfOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Dompdf\Dompdf;

/**
 * Class DomPdfFactory
 *
 * @package UthandoDomPdf\Service
 */
class DomPdfFactory implements FactoryInterface
{
    /**
     * Creates an instance of Dompdf.
     * 
     * @param  ServiceLocatorInterface $serviceLocator 
     * @return Dompdf
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var \UthandoDomPdf\Options\DomPdfOptions $config */
        $config = $serviceLocator->get(DomPdfOptions::class);
        $options = $config->toArray();
        
        return new Dompdf($options);
    }
}
