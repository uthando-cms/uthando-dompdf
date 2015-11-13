<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Mvc\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Mvc\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use UthandoDomPdf\View\Strategy\PdfStrategy;

/**
 * Class ViewPdfStrategyFactory
 *
 * @package UthandoDomPdf\Mvc\Service
 */
class ViewPdfStrategyFactory implements FactoryInterface
{
    /**
     * Create and return the PDF view strategy
     *
     * Retrieves the ViewPdfRenderer service from the service locator, and
     * injects it into the constructor for the PDF strategy.
     *
     * @param  ServiceLocatorInterface $serviceLocator 
     * @return PdfStrategy
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $pdfRenderer = $serviceLocator->get('ViewPdfRenderer');
        $pdfStrategy = new PdfStrategy($pdfRenderer);
        
        return $pdfStrategy;
    }
}
