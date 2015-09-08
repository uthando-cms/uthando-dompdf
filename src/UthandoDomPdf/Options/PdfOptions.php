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
    const DEFAULT_PAGE_COUNTER_TEXT = 'Page {PAGE_NUM} of {PAGE_COUNT}';

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
     * This is an array of arrays each array should have values <text> <position> <font>
     * example
     *
     *      array(
     *          'text' => 'text to add',
     *          'position' => 'center',
     *          'font' => array(
     *              'family' => 'serif',
     *              'weight' => 'normal',
     *          ),
     *      )
     *
     * @var array
     */
    protected $headerLines;

    /**
     * @var array
     */
    protected $footerLines;

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
     * @param array $headerLine
     * @return $this
     */
    public function addHeaderLine(array $headerLine)
    {

        $this->headerLines[] = $headerLine;
        return $this;
    }

    /**
     * @param array $headerLines
     * @return $this
     */
    public function setHeaderLines(array $headerLines)
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
    public function setFooterLines(array $footerLines)
    {
        $this->footerLines = $footerLines;
        return $this;
    }
}