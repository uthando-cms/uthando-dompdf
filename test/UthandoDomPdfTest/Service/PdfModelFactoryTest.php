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

use UthandoDomPdf\Service\PdfModelFactory;
use UthandoDomPdf\View\Model\PdfModel;
use UthandoDomPdfTest\Framework\TestCase;

class PdfModelFactoryTest extends TestCase
{
    public function testCanCreateInstanceFromServiceManager()
    {
        $model = $this->serviceManager->get(PdfModel::class);
        $this->assertInstanceOf('UthandoDomPdf\View\Model\PdfModel', $model);
    }

    public function testPdfModelInstanceCreation()
    {
        $factory = new PdfModelFactory();
        $model = $factory->createService($this->serviceManager);

        $this->assertInstanceOf('UthandoDomPdf\View\Model\PdfModel', $model);
        // is PdfOptionsTest set too.
        $this->assertInstanceOf('UthandoDomPdf\Options\PdfOptions', $model->getPdfOptions());
    }
}