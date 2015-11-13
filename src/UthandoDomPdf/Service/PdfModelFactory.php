<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Service;

use UthandoDomPdf\Options\PdfOptions;
use UthandoDomPdf\View\Model\PdfModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PdfModelFactory
 *
 * @package UthandoDomPdf\Service
 */
class PdfModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = (isset($config['uthando_dompdf']['pdf_options'])) ? $config['uthando_dompdf']['pdf_options'] : [];

        $options = new PdfOptions($config);
        $model = new PdfModel();
        $model->setPdfOptions($options);

        return $model;
    }
}
