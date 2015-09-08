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
        $model = new PdfTextLine();
        $this->model = $model;
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