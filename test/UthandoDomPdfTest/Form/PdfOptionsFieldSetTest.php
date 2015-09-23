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

use UthandoDomPdf\Form\PdfOptionsFieldSet;
use UthandoDomPdfTest\Framework\TestCase;

class PdfOptionsFieldSetTest extends TestCase
{
    public function testGetInputFilterSpecification()
    {
        $array = [
            'paper_size' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'paper_orientation' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'base_path' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'file_name' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'ToNull'],
                ],
            ],
        ];

        $form = new PdfOptionsFieldSet();
        $spec = $form->getInputFilterSpecification();
        $this->assertSame($array, $spec);
    }
}