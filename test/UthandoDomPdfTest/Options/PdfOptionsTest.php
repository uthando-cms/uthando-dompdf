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

class PdfOptionsTest extends \PHPUnit_Framework_TestCase
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

    public function testSetGetHeaderLines()
    {
        $data = [
            [
                'text' => 'some text',
                'position' => 'center',
                'font' => [
                    'family' => 'Helvetica',
                    'weight' => 'normal',
                    'size'   => 8,
                ],
            ],
        ];

        $this->model->setHeaderLines($data);
        $this->assertInstanceOf('UthandoDomPdf\Model\PdfHeaderCollection', $this->model->getHeaderLines());

        $this->setExpectedException('Zend\Stdlib\Exception\InvalidArgumentException');

        $this->model->setHeaderLines('invailid data');
        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }

    public function testSetGetFooterLines()
    {
        $data = [
            [
                'text' => 'some text',
                'position' => 'center',
                'font' => [
                    'family' => 'Helvetica',
                    'weight' => 'normal',
                ],
            ],
        ];

        $this->model->setFooterLines($data);
        $this->assertInstanceOf('UthandoDomPdf\Model\PdfFooterCollection', $this->model->getFooterLines());

        $this->setExpectedException('Zend\Stdlib\Exception\InvalidArgumentException');

        $this->model->setFooterLines('invailid data');
        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }
}