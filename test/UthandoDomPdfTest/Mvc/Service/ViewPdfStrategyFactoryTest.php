<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Mvc\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Mvc\Service;

use UthandoDomPdfTest\Framework\ApplicationTestCase;

class ViewPdfStrategyFactoryTest extends ApplicationTestCase
{
    public function testCanCreateService()
    {
        $service = $this->getApplicationServiceLocator()
            ->get('ViewPdfStrategy');
        $this->assertInstanceOf('UthandoDomPdf\View\Strategy\PdfStrategy', $service);
    }
}