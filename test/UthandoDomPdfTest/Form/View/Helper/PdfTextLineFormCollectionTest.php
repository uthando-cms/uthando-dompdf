<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Form\View\Helper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Form\View\Helper;

use UthandoDomPdfTest\Framework\ApplicationTestCase;

class PdfTextLineFormCollectionTest extends ApplicationTestCase
{
    public function testCanGetFromServiceManager()
    {
        $viewHelper = $this->getApplicationServiceLocator()
            ->get('ViewHelperManager')
            ->get('PdfTextLineFormCollection');

        $this->assertInstanceOf('UthandoDomPdf\Form\View\Helper\PdfTextLineFormCollection', $viewHelper);
    }

    public function testRender()
    {
        $testData = [
            'pdf_options' => [
                'footer_lines' => [
                    0 => [
                        'text' => 'Page {PAGE_NUM}/{PAGE_COUNT}',
                        'position' => 'left',
                        'font' => [
                            'family' => 'Helvetica',
                            'weight' => 'normal',
                            'size' => '8',
                        ],
                    ],
                ],
            ],
        ];

        $form = $this->getApplicationServiceLocator()
            ->get('FormElementManager')
            ->get('DomPdfSettings');

        $form->setData($testData);

        $viewHelper = $this->getApplicationServiceLocator()
            ->get('ViewHelperManager')
            ->get('PdfTextLineFormCollection');

        $viewHelper->setLineType('footer');

        $html = $viewHelper($form->get('pdf_options')->get('footer_lines'));

        $this->assertStringStartsWith('<table id="footer-lines-table" class="table table-bordered table-condensed">', $html);
    }
}
