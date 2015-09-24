<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Form;


use UthandoDomPdf\Form\PdfTextLineFieldSet;

class PdfTextLineFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInputFilterSpecification()
    {
        $array = [
            'text' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'position' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
        ];

        $form = new PdfTextLineFieldSet();
        $spec = $form->getInputFilterSpecification();
        $this->assertSame($array, $spec);
    }
}
