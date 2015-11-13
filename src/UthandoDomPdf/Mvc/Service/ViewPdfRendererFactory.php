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
use UthandoDomPdf\View\Renderer\PdfRenderer;

/**
 * Class ViewPdfRendererFactory
 *
 * @package UthandoDomPdf\Mvc\Service
 */
class ViewPdfRendererFactory implements FactoryInterface
{
    /**
     * Create and return the PDF view renderer
     *
     * @param  ServiceLocatorInterface $serviceLocator 
     * @return PdfRenderer
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $viewManager = $serviceLocator->get('ViewManager');
        
        $pdfRenderer = new PdfRenderer();
        $pdfRenderer->setResolver($viewManager->getResolver());
        $pdfRenderer->setHtmlRenderer($viewManager->getRenderer());
        $pdfRenderer->setEngine($serviceLocator->get('dompdf'));
        
        return $pdfRenderer;
    }
}
