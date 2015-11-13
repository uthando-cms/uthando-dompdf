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

/**
 * Class DomPdfOptionsFactory
 *
 * @package UthandoDomPdf\Options
 */
class DomPdfOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = (isset($config['uthando_dompdf']['dompdf_options'])) ? $config['uthando_dompdf']['dompdf_options'] : [];

        $options = new DomPdfOptions($config);

        return $options;
    }
}
