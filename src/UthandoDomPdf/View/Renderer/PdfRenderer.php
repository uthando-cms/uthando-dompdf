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

use UthandoCommon\Model\AbstractCollection;
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
        $pdfOptions         = $nameOrModel->getPdfOptions();
        $paperSize          = $pdfOptions->getPaperSize();
        $paperOrientation   = $pdfOptions->getPaperOrientation();
        $basePath           = $pdfOptions->getBasePath();
        
        $pdf = $this->getEngine();
        $pdf->set_paper($paperSize, $paperOrientation);
        $pdf->set_base_path($basePath);

        $html = $this->getHtmlRenderer()->render($nameOrModel, $values);

        $pdf->load_html($html);
        $pdf->render();

        $pdf = $this->processHeader($pdf, $pdfOptions);
        $pdf = $this->processFooter($pdf, $pdfOptions);

        return $pdf->output();
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

        return $this->processPageLines($pdf, $pdfOptions->getHeaderLines(), 'header');
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

        return $this->processPageLines($pdf, $pdfOptions->getFooterLines(), 'footer');
    }

    /**
     * @param DOMPDF $pdf
     * @param AbstractCollection $pageLines
     * @param $position
     * @return DOMPDF
     */
    private function processPageLines(DOMPDF $pdf, AbstractCollection $pageLines, $position)
    {
        $canvas         = $pdf->get_canvas();
        $pageWidth      = $canvas->get_width();
        $pageHeight     = ('header' === $position) ? 0 : $canvas->get_height();
        $previousHeight = 5; // margin
        $pageCount      = $canvas->get_page_count();
        $pageNumberMap  = ['/{PAGE_COUNT}/', '/{PAGE_NUM}/',];

        /* @var $line \UthandoDomPdf\Model\PdfTextLine */
        foreach ($pageLines as $line) {
            $font           = $line->getFont()->renderMetric();
            $size           = $line->getFont()->getSize();
            $text           = $line->getText();
            $fontHeight     = \Font_Metrics::get_font_height($font, $size);
            $textWidth      = $canvas->get_text_width(
                preg_replace($pageNumberMap, $pageCount, $text), $font, $size
            );

            if ('header' === $position) {
                $startY = ($pageHeight + $previousHeight) + $fontHeight;
            } else {
                $startY = ($pageHeight - $previousHeight) - $fontHeight;
            }

            $startX = $this->getPosition($pageWidth, $textWidth, $line->getPosition());

            $canvas->page_text($startX, $startY, $text, $font, $size, [0,0,0]);

            $previousHeight += $fontHeight + 1; // +1 is the line spacing
        }

        return $pdf;
    }

    private function getPosition($pageWidth, $textWidth, $position)
    {
        switch ($position) {
            case 'left':
                $startX = 5;
                break;
            case 'right':
                $startX = ($pageWidth - $textWidth) - 5;
                break;
            default:
                $startX = ($pageWidth - $textWidth) / 2;
                break;
        }

        return $startX;
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
}
