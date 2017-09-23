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
use UthandoDomPdf\Form\DomPdfSettings;
use UthandoDomPdf\Form\PdfOptionsFieldSet;
use UthandoDomPdfTest\Framework\TestCase;
use Zend\Form\Element\Submit;

class DomPdfSettingsFormTest extends TestCase
{
    public function testCanCreateForm()
    {
        /* @var $form \UthandoDomPdf\Form\DomPdfSettings */
        $form = $this->serviceManager->get('FormElementManager')
            ->get(DomPdfSettings::class);

        $this->assertInstanceOf(DomPdfSettings::class, $form);

        // check form elements are created
        $this->assertInstanceOf(PdfOptionsFieldSet::class, $form->get('pdf_options'));
        $this->assertInstanceOf(DomPdfOptionsFieldSet::class, $form->get('dompdf_options'));
    }
}