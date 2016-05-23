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

use Dompdf\Dompdf;
use UthandoDomPdf\View\Renderer\PdfRenderer;
use UthandoDomPdf\View\Strategy\PdfStrategy;
use UthandoDomPdfTest\Framework\TestCase;
use Zend\View\Resolver\TemplatePathStack;
use Zend\View\Renderer\PhpRenderer;
use Zend\Http\Response as HttpResponse;

class PdfRenderTest extends TestCase
{
    /**
     * @var PdfRenderer
     */
    protected $renderer;

    /**
     * @var PdfStrategy
     */
    protected $stategy;

    /**
     * @var TemplatePathStack
     */
    protected $resolver;

    public function setUp()
    {
        parent::setUp();
        $this->renderer = new PdfRenderer();

        $this->resolver = new TemplatePathStack();
        $this->resolver->addPath(dirname(__DIR__) . '/_templates');

        $this->renderer->setResolver($this->resolver);

        $htmlRenderer = new PhpRenderer();
        $htmlRenderer->setResolver($this->resolver);
        $this->renderer->setHtmlRenderer($htmlRenderer);
        $this->renderer->setEngine($this->serviceManager->get('dompdf'));
    }

    public function testSetGetEngine()
    {
        $pdfRenderer = new PdfRenderer();
        $engine = new Dompdf();
        $pdfRenderer->setEngine($engine);
        $this->assertInstanceOf(Dompdf::class, $pdfRenderer->getEngine());
    }

    public function testSetGetHtmlRenderer()
    {
        $pdfRenderer = new PdfRenderer();
        $htmlRenderer = new PhpRenderer();
        $pdfRenderer->setHtmlRenderer($htmlRenderer);
        $this->assertInstanceOf('Zend\View\Renderer\RendererInterface', $pdfRenderer->getHtmlRenderer());
    }
}