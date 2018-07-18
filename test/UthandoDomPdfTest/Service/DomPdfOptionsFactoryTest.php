<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Service;

use UthandoDomPdf\Service\DomPdfOptionsFactory;
use UthandoDomPdfTest\Framework\TestCase;

class DomPdfOptionsFactoryTest extends TestCase
{
    public function testCanCreateInstanceFromServiceManager()
    {
        $model = $this->serviceManager->get('DomPdfOptions');
        $this->assertInstanceOf('UthandoDomPdf\Options\DomPdfOptions', $model);
    }

    public function testDomPdfOptionsInstanceCreation()
    {
        $factory = new DomPdfOptionsFactory();
        $model = $factory->createService($this->serviceManager);
        $this->assertInstanceOf('UthandoDomPdf\Options\DomPdfOptions', $model);
    }
}