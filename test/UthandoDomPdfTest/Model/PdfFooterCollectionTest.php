<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Model;

use UthandoDomPdf\Model\PdfHeaderCollection;
use UthandoDomPdf\Model\PdfTextLine;
use UthandoDomPdfTest\Framework\TestCase;

class PdfHeaderCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAddHeaderLine()
    {
        $headerLine = new PdfTextLine();
        $headerCollection = new PdfHeaderCollection();

        $headerCollection->addHeaderLine($headerLine);
        $addedLine = $headerCollection->getEntities()[0];

        $this->assertSame($headerLine, $addedLine);
    }
}