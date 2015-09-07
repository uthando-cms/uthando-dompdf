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
}
