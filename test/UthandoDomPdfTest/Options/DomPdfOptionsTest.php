<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Options;


use UthandoDomPdf\Options\DomPdfOptions;

ini_set('xdebug.max_nesting_level', 500);

class DomPdfOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DomPdfOptions
     */
    protected $model;

    public function setUp()
    {
        $this->model = new DomPdfOptions();
    }

    public function testSetGetDir()
    {
        $this->model->setDir('/some/dir/path');
        $this->assertSame('/some/dir/path', $this->model->getDir());
    }

    public function testSetGetIncDir()
    {
        $this->model->setIncDir('includes/dir');
        $this->assertSame('includes/dir', $this->model->getIncDir());
    }

    public function testSetGetLibDir()
    {
        $this->model->setLibDir('some/library/path');
        $this->assertSame('some/library/path', $this->model->getLibDir());
    }

    public function testSetGetEnableAutoLoad()
    {
        $this->model->setEnableAutoload(true);
        $this->assertTrue($this->model->getEnableAutoload());
    }

    public function testSetGetAutoloadPrepend()
    {
        $this->model->setAutoloadPrepend(true);
        $this->assertTrue($this->model->getAutoloadPrepend());
    }

    public function testSetGetAdminUsername()
    {
        $this->model->setAdminUsername('Joe');
        $this->assertSame('Joe', $this->model->getAdminUsername());
    }

    public function testSetGetAdminPassword()
    {
        $this->model->setAdminPassword('secret');
        $this->assertSame('secret', $this->model->getAdminPassword());
    }

    public function testSetGetFontDirectory()
    {
        $this->model->setFontDirectory('path/to/fonts');
        $this->assertSame('path/to/fonts', $this->model->getFontDirectory());
    }

    public function testSetGetFontCacheDirectory()
    {
        $this->model->setFontCacheDirectory('path/to/font/cache');
        $this->assertSame('path/to/font/cache', $this->model->getFontCacheDirectory());
    }

    public function testSetGetTemporaryDirectory()
    {
        $this->model->setTemporaryDirectory('/non/existing/path');
        $this->assertSame(sys_get_temp_dir(), $this->model->getTemporaryDirectory());

        $this->model->setTemporaryDirectory('./data');
        $this->assertSame('./data', $this->model->getTemporaryDirectory());

    }

    public function testSetGetChroot()
    {
        $this->model->setChroot('./data');
        $this->assertSame(realpath('./data'), $this->model->getChroot());
    }

    public function testSetGetUnicodeEnabled()
    {
        $this->model->setUnicodeEnabled(false);
        $this->assertFalse($this->model->getUnicodeEnabled());
    }

    public function testSetGetEnableFontsubsetting()
    {
        $this->model->setEnableFontsubsetting(true);
        $this->assertTrue($this->model->getEnableFontsubsetting());
    }

    public function testSetGetPdfBackend()
    {
        $this->model->setPdfBackend('PDFLib');
        $this->assertSame('PDFLib', $this->model->getPdfBackend());
    }

    public function testSetGetPdflibLicense()
    {
        $this->model->setPdflibLicense('licence.txt');
        $this->assertSame('licence.txt', $this->model->getPdflibLicense());
    }

    public function testSetGetDefaultMediaType()
    {
        $this->model->setDefaultMediaType('print');
        $this->assertSame('print', $this->model->getDefaultMediaType());
    }

    public function testSetGetDefaultPaperSize()
    {
        $this->model->setDefaultPaperSize('a4');
        $this->assertSame('a4', $this->model->getDefaultPaperSize());
    }

    public function testSetGetDefaultFont()
    {
        $this->model->setDefaultFont('Times-New');
        $this->assertSame('Times-New', $this->model->getDefaultFont());
    }

    public function testSetGetDpi()
    {
        $this->model->setDpi(300);
        $this->assertSame(300, $this->model->getDpi());
    }

    public function testSetGetEnablePhp()
    {
        $this->model->setEnablePhp(true);
        $this->assertTrue($this->model->getEnablePhp());
    }

    public function testSetGetEnableJavascript()
    {
        $this->model->setEnableJavascript(false);
        $this->assertFalse($this->model->getEnableJavascript());
    }

    public function testSetGetEnableRemote()
    {
        $this->model->setEnableRemote(true);
        $this->assertTrue($this->model->getEnableRemote());
    }

    public function testSetGetLogOutputFile()
    {
        $this->model->setLogOutputFile('/tmp');
        $this->assertSame('/tmp', $this->model->getLogOutputFile());
    }

    public function testSetGetFontHeightRatio()
    {
        $this->model->setFontHeightRatio(3.4);
        $this->assertSame(3.4, $this->model->getFontHeightRatio());
    }

    public function testSetGetEnableCssFloat()
    {
        $this->model->setEnableCssFloat(true);
        $this->assertTrue($this->model->getEnableCssFloat());
    }

    public function testSetGetEnableHtml5parser()
    {
        $this->model->setEnableHtml5parser(true);
        $this->assertTrue($this->model->getEnableHtml5parser());
    }

    public function testSetGetDebugPng()
    {
        $this->model->setDebugPng(true);
        $this->assertTrue($this->model->getDebugPng());
    }

    public function testSetGetDebugKeepTemp()
    {
        $this->model->setDebugKeepTemp(true);
        $this->assertTrue($this->model->getDebugKeepTemp());
    }

    public function testSetGetDebugCss()
    {
        $this->model->setDebugCss(true);
        $this->assertTrue($this->model->getDebugCss());
    }

    public function testSetGetDebugLayout()
    {
        $this->model->setDebugLayout(true);
        $this->assertTrue($this->model->getDebugLayout());
    }

    public function testSetGetDebugLayoutLines()
    {
        $this->model->setDebugLayoutLines(true);
        $this->assertTrue($this->model->getDebugLayoutLines());
    }

    public function testSetGetDebugLayoutBlocks()
    {
        $this->model->setDebugLayoutBlocks(true);
        $this->assertTrue($this->model->getDebugLayoutBlocks());
    }

    public function testSetGetDebugLayoutInline()
    {
        $this->model->setDebugLayoutInline(true);
        $this->assertTrue($this->model->getDebugLayoutInline());
    }

    public function testSetGetDebugLayoutPaddingBox()
    {
        $this->model->setDebugLayoutPaddingBox(true);
        $this->assertTrue($this->model->getDebugLayoutPaddingBox());
    }
}
