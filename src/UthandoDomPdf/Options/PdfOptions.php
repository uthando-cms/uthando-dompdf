<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class PdfOptions
 *
 * @package UthandoDomPdf\Options
 */
class PdfOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $paperSize = '8x11';

    /**
     * @var string
     */
    protected $paperOrientation = 'portrait';

    /**
     * @var string
     */
    protected $basePath = '/';

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var array
     */
    protected $headerLines;

    /**
     * @var array
     */
    protected $footerLines;

    /**
     * @var string
     */
    protected $positionPageCounter = 'none';

    /**
     * @var string
     */
    protected $textPageCounter = 'Page {PAGE_NUM} of {PAGE_COUNT}';

    /**
     * @return string
     */
    public function getPaperSize()
    {
        return $this->paperSize;
    }

    /**
     * @param string $paperSize
     * @return $this
     */
    public function setPaperSize($paperSize)
    {
        $this->paperSize = $paperSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaperOrientation()
    {
        return $this->paperOrientation;
    }

    /**
     * @param string $paperOrientation
     * @return $this
     */
    public function setPaperOrientation($paperOrientation)
    {
        $this->paperOrientation = $paperOrientation;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return $this
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaderLines()
    {
        return $this->headerLines;
    }

    /**
     * @param array $headerLines
     * @return $this
     */
    public function setHeaderLines($headerLines)
    {
        $this->headerLines = $headerLines;
        return $this;
    }

    /**
     * @return array
     */
    public function getFooterLines()
    {
        return $this->footerLines;
    }

    /**
     * @param array $footerLines
     * @return $this
     */
    public function setFooterLines($footerLines)
    {
        $this->footerLines = $footerLines;
        return $this;
    }

    /**
     * @return string
     */
    public function getPositionPageCounter()
    {
        return $this->positionPageCounter;
    }

    /**
     * @param string $positionPageCounter
     * @return $this
     */
    public function setPositionPageCounter($positionPageCounter)
    {
        $this->positionPageCounter = $positionPageCounter;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextPageCounter()
    {
        return $this->textPageCounter;
    }

    /**
     * @param string $textPageCounter
     * @return $this
     */
    public function setTextPageCounter($textPageCounter)
    {
        $this->textPageCounter = $textPageCounter;
        return $this;
    }
}