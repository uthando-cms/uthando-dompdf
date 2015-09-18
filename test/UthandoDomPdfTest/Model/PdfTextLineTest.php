<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Model;

use UthandoDomPdf\Model\PdfTextLine;
use UthandoDomPdf\Model\PdfTextLineFont;
use UthandoDomPdfTest\Framework\TestCase;

class PdfTextLineTest extends TestCase
{
    /**
     * @var PdfTextLine
     */
    protected $model;

    public function setUp()
    {
        parent::setUp();
        $model = new PdfTextLine();
        $this->model = $model;
    }

    public function testConstructor()
    {
        $data = [
            'text' => 'This is a test',
            'position' => 'center',
            'font' => [
                'family' => 'Times-New',
                'weight' => 'bold',
                'size'   => 8,
            ],
        ];

        $model = new PdfTextLine($data);

        $this->assertSame($data['text'], $model->getText());
        $this->assertSame($data['position'], $model->getPosition());
        $this->assertInstanceOf('UthandoDomPdf\Model\PdfTextLineFont', $model->getFont());
    }

    public function testSetGetText()
    {
        $this->model->setText('This is a test');
        $this->assertSame('This is a test', $this->model->getText());
    }

    public function testSetGetPosition()
    {
        $this->model->setPosition('center');
        $this->assertSame('center', $this->model->getPosition());

        // test exception is called with illegal option
        $this->setExpectedException('InvalidArgumentException');

        $this->model->setPosition('top');//if this method not throw exception it must be fail too.

        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }

    public function testSetGetFont()
    {
        $model = new PdfTextLineFont();

        // set with PdfTextLineFont object
        $this->model->setFont($model);
        $this->assertInstanceOf('UthandoDomPdf\Model\PdfTextLineFont', $this->model->getFont());

        // reset model
        $this->model = new PdfTextLine();

        //set with array
        $this->model->setFont(array(
            'family' => 'Times-New',
            'weight' => 'bold',
        ));
        $this->assertInstanceOf('UthandoDomPdf\Model\PdfTextLineFont', $this->model->getFont());
    }
}