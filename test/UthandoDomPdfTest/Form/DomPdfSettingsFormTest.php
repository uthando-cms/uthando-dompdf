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

use UthandoDomPdfTest\Framework\TestCase;

class DomPdfSettingsFormTest extends TestCase
{
    public function testCanCreateForm()
    {
        /* @var $form \UthandoDomPdf\Form\DomPdfSettings */
        $form = $this->serviceManager->get('FormElementManager')
            ->get('DomPdfSettings');

        $this->assertInstanceOf('UthandoDomPdf\Form\DomPdfSettings', $form);

        // check form elements are created
        $this->assertInstanceOf('UthandoDomPdf\Form\PdfOptionsFieldSet', $form->get('pdf_options'));
        $this->assertInstanceOf('UthandoDomPdf\Form\DomPdfOptionsFieldSet', $form->get('dompdf_options'));
        $this->assertInstanceOf('Zend\Form\Element\Submit', $form->get('button-submit'));
    }
}