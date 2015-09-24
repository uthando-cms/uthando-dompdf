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

use UthandoDomPdf\Form\DomPdfOptionsFieldSet;

class DomPdfOptionsFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInputFilterSpecification()
    {
        $array = [
            'font_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'font_cache_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'temporary_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'chroot' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'unicode_enabled' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_fontsubsetting' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'pdf_backend' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'pdflib_license' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_media_type' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_paper_size' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_font' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'dpi' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'enable_php' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_javascript' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_remote' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'log_output_file' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'font_height_ratio' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'enable_css_float' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_html5parser' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_png' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_keep_temp' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_css' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_lines' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_blocks' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_inline' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_padding_box' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
        ];

        $form = new DomPdfOptionsFieldSet();
        $spec = $form->getInputFilterSpecification();
        $this->assertSame($array, $spec);
    }
}