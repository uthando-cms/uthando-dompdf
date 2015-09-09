<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\View\Renderer
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\View\Renderer;

use UthandoDomPdf\View\Renderer\PdfRenderer;
use UthandoDomPdfTest\Framework\TestCase;
use Zend\View\Renderer\PhpRenderer;

class PdfRenderTest extends TestCase
{
    public function testSetGetEngine()
    {
        $pdfRenderer = new PdfRenderer();
        $engine = new \DOMPDF();
        $pdfRenderer->setEngine($engine);
        $this->assertInstanceOf('DOMPDF', $pdfRenderer->getEngine());
    }

    public function testSetGetHtmlRenderer()
    {
        $pdfRenderer = new PdfRenderer();
        $htmlRenderer = new PhpRenderer();
        $pdfRenderer->setHtmlRenderer($htmlRenderer);
        $this->assertInstanceOf('Zend\View\Renderer\RendererInterface', $pdfRenderer->getHtmlRenderer());
    }
}