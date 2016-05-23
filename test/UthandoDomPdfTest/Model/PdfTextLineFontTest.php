<?php

namespace UthandoDomPdfTest\Model;

use UthandoDomPdf\Model\PdfTextLineFont;
use UthandoDomPdfTest\Framework\TestCase;

class PdfTextLineFontTest extends TestCase
{
    /**
     * @var PdfTextLineFont
     */
    protected $model;

    public function setUp()
    {
        parent::setUp();
        $model = new PdfTextLineFont();
        $this->model = $model;
    }

    public function testConstructor()
    {
        $data = [
            'family' => 'Times-New',
            'weight' => 'bold',
            'size'   => 10,
        ];

        $model = new PdfTextLineFont($data);

        $this->assertSame($data['family'], $model->getFamily());
        $this->assertSame($data['weight'], $model->getWeight());
        $this->assertSame($data['size'], $model->getSize());
    }

    public function testSetGetWeight()
    {
        // test exception is called with illegal option
        $this->setExpectedException(
            'InvalidArgumentException',
            '"wrong_bold" must be one of normal, bold, italic, bold_italic called in "UthandoDomPdf\Model\PdfTextLineFont::setWeight"'
        );

        $this->model->setWeight('wrong_bold');//if this method not throw exception it must be fail too.

        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }
}