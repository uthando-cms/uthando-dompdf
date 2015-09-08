<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\View\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\View\Renderer;

use UthandoDomPdf\Options\PdfOptions;
use UthandoDomPdf\View\Model\PdfModel;
use Zend\View\Model\ModelInterface;
use Zend\View\Renderer\RendererInterface as Renderer;
use Zend\View\Resolver\ResolverInterface as Resolver;
use DOMPDF;

/**
 * Class PdfRenderer
 *
 * @package UthandoDomPdf\View\Renderer
 */
class PdfRenderer implements Renderer
{
    /**
     * @var DOMPDF
     */
    private $dompdf;

    /**
     * @var Resolver
     */
    private $resolver;

    /**
     * @var Renderer
     */
    private $htmlRenderer;

    /**
     * @param Renderer $renderer
     * @return $this
     */
    public function setHtmlRenderer(Renderer $renderer)
    {
        $this->htmlRenderer = $renderer;
        return $this;
    }

    /**
     * @return Renderer
     */
    public function getHtmlRenderer()
    {
        return $this->htmlRenderer;
    }

    /**
     * @param DOMPDF $dompdf
     * @return $this
     */
    public function setEngine(DOMPDF $dompdf)
    {
        $this->dompdf = $dompdf;
        return $this;
    }

    /**
     * @return DOMPDF
     */
    public function getEngine()
    {
        return $this->dompdf;
    }

    /**
     * Renders values as a PDF
     *
     * @param string|ModelInterface|PdfModel $nameOrModel
     * @param  null|array|\ArrayAccess Values to use during rendering
     * @return string The script output.
     */
    public function render($nameOrModel, $values = null)
    {
        $html = $this->getHtmlRenderer()->render($nameOrModel, $values);

        $pdfOptions = $nameOrModel->getPdfOptions();
        
        $paperSize = $pdfOptions->getPaperSize();
        $paperOrientation = $pdfOptions->getPaperOrientation();
        $basePath = $pdfOptions->getBasePath();
        
        $pdf = $this->getEngine();
        $pdf->set_paper($paperSize, $paperOrientation);
        $pdf->set_base_path($basePath);
        
        $pdf->load_html($html);
        $pdf->render();

        $this->processHeader($pdf, $pdfOptions);
        $this->processFooter($pdf, $pdfOptions);
        
        return $pdf->output();
    }

    /**
     * @param Resolver $resolver
     * @return $this
     */
    public function setResolver(Resolver $resolver)
    {
        $this->resolver = $resolver;
        return $this;
    }

    /**
     * @param DOMPDF $pdf
     * @param PdfOptions $pdfOptions
     * @return DOMPDF
     */
    private function processHeader(DOMPDF $pdf, PdfOptions $pdfOptions)
    {
        if (empty($pdfOptions->getHeaderLines())) {
            return $pdf;
        }


    }

    /**
     * @param DOMPDF $pdf
     * @param PdfOptions $pdfOptions
     * @return DOMPDF
     */
    private function processFooter(DOMPDF $pdf, PdfOptions $pdfOptions)
    {
        if (empty($pdfOptions->getFooterLines())) {
            return $pdf;
        }

        $pageWidth      = $pdf->get_canvas()->get_width();
        $pageHeight     = $pdf->get_canvas()->get_height();
        $footerLines    = array_reverse($pdfOptions->getFooterLines());

        foreach ($footerLines as $footerLine) {

        }

    }

    /**
     * Calculates coordinates x and y where the text in the header/footer (property) where will be printed
     *
     * @param string $position The fixed position
     * @param integer $page_width The width of page
     * @param integer $page_height The height of page
     * @param string $width_text The width value calculated of 'textPageCounter' (property)
     * @return array
     */
    private function calculatePosition($position, $page_width, $page_height, $width_text)
    {
        switch ($position)
        {
            case 'top-center':
                $yPage = 15;
                $xPage = ($page_width / 2) - ($width_text / 2);
                break;
            case 'top-left':
                $yPage = 15;
                $xPage = 15;
                break;
            case 'top-right':
                $yPage = 15;
                $xPage = ($page_width - 15) - $width_text;
                break;
            case 'bottom-left':
                $yPage = $page_height - 24;
                $xPage = 15;
                break;
            case 'bottom-center':
                $yPage = $page_height - 24;
                $xPage = ($page_width / 2) - ($width_text / 2);
                break;
            case 'bottom-right':
                $yPage = $page_height - 24;
                $xPage = ($page_width - 15) - $width_text;
                break;
            default:
                $yPage = $page_height - 24;
                $xPage = ($page_width - 15) - $width_text;
                break;
        }

        return ['xPage' => $xPage, 'yPage' => $yPage];
    }
}
