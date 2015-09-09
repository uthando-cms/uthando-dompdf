<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Options;

use UthandoDomPdf\Options\PdfOptions;
use UthandoDomPdfTest\Framework\TestCase;

class PdfOptionsTest extends TestCase
{
    /**
     * @var PdfOptions
     */
    protected $model;

    public function setUp()
    {
        $model = new PdfOptions();
        $this->model = $model;
    }

    public function testSetGetPaperSize()
    {
        $this->model->setPaperSize('a2');
        $this->assertSame('a2', $this->model->getPaperSize());
    }

    public function testSetGetPaperOrientation()
    {
        $this->model->setPaperOrientation('landscape');
        $this->assertSame('landscape', $this->model->getPaperOrientation());
    }

    public function testSetGetBasePath()
    {
        $this->model->setBasePath('/some/dir');
        $this->assertSame('/some/dir', $this->model->getBasePath());
    }

    public function testSetGetFilename()
    {
        $this->model->setFileName('somefile.pdf');
        $this->assertSame('somefile.pdf', $this->model->getFileName());
    }
}