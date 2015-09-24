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

use UthandoDomPdf\Form\PdfTextLineFontFieldSet;

class PdfTextLineFontFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInputFilterSpecification()
    {
        $array = [
            'family' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'weight' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'size' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
        ];

        $form = new PdfTextLineFontFieldSet();
        $spec = $form->getInputFilterSpecification();
        $this->assertSame($array, $spec);
    }
}
