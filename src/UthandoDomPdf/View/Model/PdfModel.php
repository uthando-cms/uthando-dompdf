<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\View\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\View\Model;

use UthandoDomPdf\Options\PdfOptions;
use Zend\View\Model\ViewModel;

/**
 * Class PdfModel
 *
 * @package UthandoDomPdf\View\Model
 */
class PdfModel extends ViewModel
{
    /**
     * PDF probably won't need to be captured into a 
     * a parent container by default.
     * 
     * @var string
     */
    protected $captureTo = null;

    /**
     * PDF is usually terminal
     * 
     * @var bool
     */
    protected $terminate = true;

    /**
     * @var PdfOptions
     */
    protected $pdfOptions;

    /**
     * @return PdfOptions
     */
    public function getPdfOptions()
    {
        return $this->pdfOptions;
    }

    /**
     * @param PdfOptions $pdfOptions
     * @return $this
     */
    public function setPdfOptions(PdfOptions $pdfOptions)
    {
        $this->pdfOptions = $pdfOptions;
        return $this;
    }
}
