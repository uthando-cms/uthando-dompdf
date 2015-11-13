<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Options;

use UthandoDomPdf\Model\PdfFooterCollection;
use UthandoDomPdf\Model\PdfHeaderCollection;
use Zend\Stdlib\AbstractOptions;
use Zend\Stdlib\Exception\InvalidArgumentException;

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
     * @var PdfHeaderCollection
     */
    protected $headerLines;

    /**
     * @var PdfFooterCollection
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
     * @return PdfHeaderCollection
     */
    public function getHeaderLines()
    {
        return $this->headerLines;
    }

    /**
     * @param array|PdfHeaderCollection $headerLines
     * @return $this
     */
    public function setHeaderLines($headerLines)
    {
        if (is_array($headerLines)) {
            $headerLines = new PdfHeaderCollection($headerLines);
        }

        if (!$headerLines instanceof PdfHeaderCollection) {
            throw new InvalidArgumentException(
                'you must only use an array or an instance of UthandoDomPdf\Model\PdfHeaderCollection'
            );
        }

        $this->headerLines = $headerLines;

        return $this;
    }

    /**
     * @return PdfFooterCollection
     */
    public function getFooterLines()
    {
        return $this->footerLines;
    }

    /**
     * @param array|PdfFooterCollection $footerLines
     * @return $this
     */
    public function setFooterLines($footerLines)
    {
        if (is_array($footerLines)) {
            $footerLines = new PdfFooterCollection($footerLines);
        }

        if (!$footerLines instanceof PdfFooterCollection) {
            throw new InvalidArgumentException(
                'you must only use an array or an instance of UthandoDomPdf\Model\PdfFooterCollection'
            );
        }

        $this->footerLines = $footerLines;

        return $this;
    }
}
