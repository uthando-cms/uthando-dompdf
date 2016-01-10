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
use DOMPDF;

/**
 * Class PdfRenderer
 *
 * @package UthandoDomPdf\View\Renderer
 */
class PdfRenderer implements Renderer
{
    static $PAPER_SIZES = array(
        "4a0" => array(0,0,4767,6740),
        "2a0" => array(0,0,3370,4767),
        "a0" => array(0,0,2383,3370),
        "a1" => array(0,0,1683,2383),
        "a2" => array(0,0,1190,1683),
        "a3" => array(0,0,841,1190),
        "a4" => array(0,0,595,841),
        "a5" => array(0,0,419,595),
        "a6" => array(0,0,297,419),
        "a7" => array(0,0,209,297),
        "a8" => array(0,0,147,209),
        "a9" => array(0,0,104,147),
        "a10" => array(0,0,73,104),
        "b0" => array(0,0,2834,4008),
        "b1" => array(0,0,2004,2834),
        "b2" => array(0,0,1417,2004),
        "b3" => array(0,0,1000,1417),
        "b4" => array(0,0,708,1000),
        "b5" => array(0,0,498,708),
        "b6" => array(0,0,354,498),
        "b7" => array(0,0,249,354),
        "b8" => array(0,0,175,249),
        "b9" => array(0,0,124,175),
        "b10" => array(0,0,87,124),
        "c0" => array(0,0,2599,3676),
        "c1" => array(0,0,1836,2599),
        "c2" => array(0,0,1298,1836),
        "c3" => array(0,0,918,1298),
        "c4" => array(0,0,649,918),
        "c5" => array(0,0,459,649),
        "c6" => array(0,0,323,459),
        "c7" => array(0,0,229,323),
        "c8" => array(0,0,161,229),
        "c9" => array(0,0,113,161),
        "c10" => array(0,0,79,113),
        "ra0" => array(0,0,2437,3458),
        "ra1" => array(0,0,1729,2437),
        "ra2" => array(0,0,1218,1729),
        "ra3" => array(0,0,864,1218),
        "ra4" => array(0,0,609,864),
        "sra0" => array(0,0,2551,3628),
        "sra1" => array(0,0,1814,2551),
        "sra2" => array(0,0,1275,1814),
        "sra3" => array(0,0,907,1275),
        "sra4" => array(0,0,637,907),
        "letter" => array(0,0,612.00,792.00),
        "legal" => array(0,0,612.00,1008.00),
        "ledger" => array(0,0,1224.00, 792.00),
        "tabloid" => array(0,0,792.00, 1224.00),
        "executive" => array(0,0,521.86,756.00),
        "folio" => array(0,0,612.00,936.00),
        "commercial #10 envelope" => array(0,0,684,297),
        "catalog #10 1/2 envelope" => array(0,0,648,864),
        "8.5x11" => array(0,0,612.00,792.00),
        "8.5x14" => array(0,0,612.00,1008.0),
        "11x17"  => array(0,0,792.00, 1224.00),
    );

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
        $paperSize          = self::$PAPER_SIZES[strtolower($pdfOptions->getPaperSize())];
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

        return $this->processPageLines($pdf, $pdfOptions, 'header');
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

        return $this->processPageLines($pdf, $pdfOptions, 'footer');
    }

    /**
     * @param DOMPDF $pdf
     * @param PdfOptions $pdfOptions
     * @param $position
     * @return DOMPDF
     */
    private function processPageLines(DOMPDF $pdf, PdfOptions $pdfOptions, $position)
    {
        $pageLines      = ('header' === $position) ? $pdfOptions->getHeaderLines() : $pdfOptions->getFooterLines();
        $canvas         = $pdf->get_canvas();
        $pageWidth      = $canvas->get_width();
        $pageHeight     = ('header' === $position) ? $pdfOptions->getTopMargin() : $canvas->get_height() - $pdfOptions->getBottomMargin();
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
