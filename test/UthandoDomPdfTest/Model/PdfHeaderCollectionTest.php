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

use UthandoDomPdf\Model\PdfFooterCollection;
use UthandoDomPdf\Model\PdfTextLine;

class PdfFooterCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAddFooterLine()
    {
        $footerLine = new PdfTextLine();
        $footerCollection = new PdfFooterCollection();

        $footerCollection->addFooterLine($footerLine);
        $addedLine = $footerCollection->getEntities()[0];

        $this->assertSame($footerLine, $addedLine);
    }
}