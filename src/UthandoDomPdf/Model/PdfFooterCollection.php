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
 * Class PdfFooterCollection
 *
 * @package UthandoDomPdf\Model
 */
class PdfFooterCollection extends AbstractCollection
{
    protected $entityClass = 'UthandoDomPdf\Model\PdfTextLine';

    public function __construct($array = [])
    {
        $this->addFooterLine($array);
    }

    public function addFooterLines()
    {

    }

    public function addFooterLine($footerLine)
    {
        if ($footerLine instanceof PdfTextLine) {
            $this->add($footerLine);
        }

        if (is_array($footerLine)) {
            $footerLine = new $this->entityClass($footerLine);
            $this->add($footerLine);
        }

        return $this;
    }
}