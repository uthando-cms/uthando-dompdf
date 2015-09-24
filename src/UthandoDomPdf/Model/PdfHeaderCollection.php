<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\Model;

use UthandoCommon\Model\AbstractCollection;

/**
 * Class PdfHeaderCollection
 *
 * @package UthandoDomPdf\Model
 */
class PdfHeaderCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $entityClass = 'UthandoDomPdf\Model\PdfTextLine';

    /**
     * @param array $array
     */
    public function __construct($array = [])
    {
        $this->addHeaderLines($array);
    }

    /**
     * @param array $headerLines
     */
    public function addHeaderLines(array $headerLines)
    {
        foreach ($headerLines as $line) {
            $this->addHeaderLine($line);
        }
    }

    /**
     * @param $headerLine
     * @return $this
     * @throws \UthandoCommon\Model\CollectionException
     */
    public function addHeaderLine($headerLine)
    {
        if ($headerLine instanceof PdfTextLine) {
            $this->add($headerLine);
        }

        if (is_array($headerLine)) {
            $headerLine = new $this->entityClass($headerLine);
            $this->add($headerLine);
        }

        return $this;
    }
}
