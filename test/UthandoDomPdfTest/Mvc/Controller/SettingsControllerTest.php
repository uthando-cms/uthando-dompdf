<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdfTest\Mvc\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdfTest\Mvc\Controller;

use UthandoDomPdfTest\Framework\TestCase;

class SettingsControllerTest extends TestCase
{
    public function testCanGetControllerFromServiceManager()
    {
        /* @var $controller \UthandoDomPdf\Mvc\Controller\Settings */
        $controller = $this->serviceManager->get('ControllerManager')
            ->get('UthandoDomPdf\Controller\Settings');

        $this->assertInstanceOf('UthandoDomPdf\Mvc\Controller\Settings', $controller);
        $this->assertSame('DomPdfSettings', $controller->getFormName());
        $this->assertSame('uthando_dompdf', $controller->getConfigKey());
    }
}