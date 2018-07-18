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

use UthandoDomPdf\Form\DomPdfSettings;
use UthandoDomPdf\Mvc\Controller\SettingsController;
use UthandoDomPdfTest\Framework\TestCase;

class SettingsControllerTest extends TestCase
{
    public function testCanGetControllerFromServiceManager()
    {
        /* @var $controller \UthandoDomPdf\Mvc\Controller\SettingsController */
        $controller = $this->serviceManager->get('ControllerManager')
            ->get(SettingsController::class);

        $this->assertInstanceOf('UthandoDomPdf\Mvc\Controller\SettingsController', $controller);
        $this->assertSame(DomPdfSettings::class, $controller->getFormName());
        $this->assertSame('uthando_dompdf', $controller->getConfigKey());
    }
}