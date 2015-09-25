<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Form\View\Helper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Form\View\Helper;

use UthandoDomPdfTest\Framework\TestCase;
use Zend\Form\Element\Collection;

class PdfTextLineFormCollectionTest extends TestCase
{
    public function testCanGetFromServiceManager()
    {
        $viewHelper = $this->serviceManager
            ->get('ViewHelperManager')
            ->get('PdfTextLineFormCollection');

        $this->assertInstanceOf('UthandoDomPdf\Form\View\Helper\PdfTextLineFormCollection', $viewHelper);
    }
}
