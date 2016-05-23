<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\View\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\View\Renderer;

use UthandoDomPdf\Options\PdfOptions;
use UthandoDomPdf\View\Model\PdfModel;
use Zend\View\Model\ModelInterface;
use Zend\View\Renderer\RendererInterface as Renderer;
use Zend\View\Resolver\ResolverInterface as Resolver;
use Dompdf\Dompdf;

/**
 * Class PdfRenderer
 *
 * @package UthandoDomPdf\View\Renderer
 */
class PdfRenderer implements Renderer
{
    /**
     * @var Dompdf
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
    public function setEngine(Dompdf $dompdf)
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
        $paperSize          = explode(',', $pdfOptions->getPaperSize());
        $paperOrientation   = $pdfOptions->getPaperOrientation();
        $basePath           = $pdfOptions->getBasePath();

        $paperSize          = (count($paperSize) === 1) ? $paperSize[0] : $paperSize;
        
        $pdf = $this->getEngine();
        $pdf->setPaper($paperSize, $paperOrientation);
        $pdf->setBasePath($basePath);

        $html = $this->getHtmlRenderer()->render($nameOrModel, $values);

        $pdf->loadHtml($html);
        $pdf->render();

        $pdf = $this->processHeader($pdf, $pdfOptions);
        $pdf = $this->processFooter($pdf, $pdfOptions);

        return $pdf->output();
    }

    /**
     * @param Dompdf $pdf
     * @param PdfOptions $pdfOptions
     * @return Dompdf
     */
    private function processHeader(Dompdf $pdf, PdfOptions $pdfOptions)
    {
        if (empty($pdfOptions->getHeaderLines())) {
            return $pdf;
        }

        return $this->processPageLines($pdf, $pdfOptions, 'header');
    }

    /**
     * @param Dompdf $pdf
     * @param PdfOptions $pdfOptions
     * @return Dompdf
     */
    private function processFooter(Dompdf $pdf, PdfOptions $pdfOptions)
    {
        if (empty($pdfOptions->getFooterLines())) {
            return $pdf;
        }

        return $this->processPageLines($pdf, $pdfOptions, 'footer');
    }

    /**
     * @param Dompdf $pdf
     * @param PdfOptions $pdfOptions
     * @param $position
     * @return Dompdf
     */
    private function processPageLines(Dompdf $pdf, PdfOptions $pdfOptions, $position)
    {
        $pageLines      = ('header' === $position) ? $pdfOptions->getHeaderLines() : $pdfOptions->getFooterLines();
        $canvas         = $pdf->getCanvas();
        $pageWidth      = $canvas->get_width();
        $pageHeight     = ('header' === $position) ? $pdfOptions->getTopMargin() : $canvas->get_height() - $pdfOptions->getBottomMargin();
        $previousHeight = 5; // margin
        $pageCount      = $canvas->get_page_count();
        $pageNumberMap  = ['/{PAGE_COUNT}/', '/{PAGE_NUM}/',];
        $fontMetric     = $pdf->getFontMetrics();

        /* @var $line \UthandoDomPdf\Model\PdfTextLine */
        foreach ($pageLines as $line) {
            $font           = $fontMetric->getFont($line->getFont()->getFamily(), $line->getFont()->getWeight());
            $size           = $line->getFont()->getSize();
            $text           = $line->getText();
            $fontHeight     = $fontMetric->getFontHeight($font, $size);
            $textWidth      = $canvas->get_text_width(
                preg_replace($pageNumberMap, $pageCount, $text), $font, $size
            );

            if ('header' === $position) {
                $startY = ($pageHeight + $previousHeight) + $fontHeight;
            } else {
                $startY = ($pageHeight - $previousHeight) - $fontHeight;
            }

            $startX = $this->getPosition($pageWidth, $textWidth, $line->getPosition(), $pdfOptions);

            $canvas->page_text($startX, $startY, $text, $font, $size, [0,0,0]);

            $previousHeight += $fontHeight + 1; // +1 is the line spacing
        }

        return $pdf;
    }

    /**
     * @param $pageWidth
     * @param $textWidth
     * @param $position
     * @param PdfOptions $pdfOptions
     * @return float|int
     */
    private function getPosition($pageWidth, $textWidth, $position, PdfOptions $pdfOptions)
    {
        switch ($position) {
            case 'left':
                $startX = $pdfOptions->getLeftMargin();
                break;
            case 'right':
                $startX = ($pageWidth - $textWidth) - $pdfOptions->getRightMargin();
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
