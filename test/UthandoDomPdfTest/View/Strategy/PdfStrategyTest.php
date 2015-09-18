<?php

namespace UthandoDomPdfTest\View\Strategy;

use Zend\View\Model\ViewModel;
use Zend\View\Resolver\TemplatePathStack;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\ViewEvent;
use Zend\Http\Response as HttpResponse;
use UthandoDomPdfTest\Framework\TestCase;
use UthandoDomPdf\View\Model\PdfModel;
use UthandoDomPdf\View\Renderer\PdfRenderer;
use UthandoDomPdf\View\Strategy\PdfStrategy;

class PdfStrategyTest extends TestCase
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
     * @var ViewEvent
     */
    protected $event;

    /**
     * @var HttpResponse
     */
    protected $response;

    /**
     * @var TemplatePathStack
     */
    protected $resolver;

    public function setUp()
    {
        parent::setUp();
        $this->renderer = new PdfRenderer();
        $this->strategy = new PdfStrategy($this->renderer);
        $this->event    = new ViewEvent();
        $this->response = new HttpResponse();
        
        $this->resolver = new TemplatePathStack();
        $this->resolver->addPath(dirname(__DIR__) . '/_templates');
        
        $this->renderer->setResolver($this->resolver);
        
        $htmlRenderer = new PhpRenderer();
        $htmlRenderer->setResolver($this->resolver);
        $this->renderer->setHtmlRenderer($htmlRenderer);
        $this->renderer->setEngine($this->serviceManager->get('dompdf'));
    }

    public function testPdfModelSelectsPdfStrategy()
    {
        $this->event->setModel(new PdfModel());
        $result = $this->strategy->selectRenderer($this->event);
        $this->assertSame($this->renderer, $result);

        $this->event->setModel(new ViewModel());
        $result = $this->strategy->selectRenderer($this->event);
        $this->assertNull($result);
    }

    public function testInjectResponseWithWrongRendererAndResponse()
    {
        $this->event->setRenderer($this->renderer);
        $this->event->setResult(new ViewModel());
        $result = $this->strategy->injectResponse($this->event);
        $this->assertNull($result);

        $this->event->setRenderer($this->renderer->getHtmlRenderer());
        $this->event->setResult(new ViewModel());
        $result = $this->strategy->injectResponse($this->event);
        $this->assertNull($result);
    }

    public function testContentTypeResponseHeader()
    {
        $model = $this->serviceManager->get('PdfModel');
        $model->setTemplate('basic.phtml');
        
        $this->event->setModel($model);
        $this->event->setResponse($this->response);
        $this->event->setRenderer($this->renderer);
        $this->event->setResult($this->renderer->render($model));
        
        $this->strategy->injectResponse($this->event);
        
        $headers           = $this->event->getResponse()->getHeaders();
        $contentTypeHeader = $headers->get('content-type');
        
        $this->assertInstanceof('Zend\Http\Header\ContentType', $contentTypeHeader);
        $this->assertEquals($contentTypeHeader->getFieldValue(), 'application/pdf');
        ob_end_flush();
    }

    public function testResponseHeadersWithFileName()
    {
        $model = $this->serviceManager->get('PdfModel');
        $model->setTemplate('basic.phtml');
        $model->getPdfOptions()
            ->setFilename('testPdfFileName');

        $model->getPdfOptions()->setFooterLines([
            [
                'text'      => 'top line',
                'position'  => 'center',
                'font' => [
                    'family'    => 'Helvetica',
                    'weight'    => 'normal',
                    'size'      => 8,
                ],
            ],
            [
                'text'      => 'second line',
                'position'  => 'left',
                'font' => [
                    'family'    => 'Helvetica',
                    'weight'    => 'normal',
                    'size'      => 8,
                ],
            ],
            [
                'text'      => 'third line',
                'position'  => 'right',
                'font' => [
                    'family'    => 'Helvetica',
                    'weight'    => 'normal',
                    'size'      => 8,
                ],
            ],
        ]);

        $model->getPdfOptions()->setHeaderLines([
            [
                'text'      => 'first line',
                'position'  => 'center',
                'font' => [
                    'family'    => 'Helvetica',
                    'weight'    => 'normal',
                    'size'      => 8,
                ],
            ],
        ]);
        
        $this->event->setModel($model);
        $this->event->setResponse($this->response);
        $this->event->setRenderer($this->renderer);
        $this->event->setResult($this->renderer->render($model));
        
        $this->strategy->injectResponse($this->event);
        
        $headers                  = $this->event->getResponse()->getHeaders();
        $contentDispositionHeader = $headers->get('Content-Disposition');
        
        $this->assertInstanceof('Zend\Http\Header\ContentDisposition', $contentDispositionHeader);
        $this->assertEquals($contentDispositionHeader->getFieldValue(), 'attachment; filename=testPdfFileName.pdf');
        ob_end_flush();
    }
}
