<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\View\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\View\Model;

use UthandoDomPdf\Options\PdfOptions;
use UthandoDomPdf\View\Model\PdfModel;
use UthandoDomPdfTest\Framework\TestCase;

class PdfModelTest extends TestCase
{
    public function testSetGetPdfOptions()
    {
        $model = new PdfModel();
        $options = new PdfOptions();

        $model->setPdfOptions($options);
        $this->assertInstanceOf('UthandoDomPdf\Options\PdfOptions', $model->getPdfOptions());
    }
}