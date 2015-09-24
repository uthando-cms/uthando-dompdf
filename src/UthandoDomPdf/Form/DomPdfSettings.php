<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\Form;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use Zend\Form\Form;

/**
 * Class Settings
 *
 * @package Settings\Form
 */
class DomPdfSettings extends Form
{
    /**
     * Set up the form elements
     */
    public function init()
    {
        $this->add([
            'type' => 'PdfOptionsFieldSet',
            'name' => 'pdf_options',
            'options' => [
                'label' => 'PDF Options',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => 'DomPdfOptionsFieldSet',
            'name' => 'dompdf_options',
            'options' => [
                'label' => 'DOMPDF Options',
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'name' => 'button-submit',
            'type' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'class' => 'btn-primary'
            ],
            'options' => [
                'label' => 'Save',
                'column-size' => 'md-6'
            ],
        ]);
    }
}
