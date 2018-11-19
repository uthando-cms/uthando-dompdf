<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Mvc\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Controller;

use UthandoCommon\Controller\SettingsTrait;
use UthandoDomPdf\Form\DomPdfSettings;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class Settings
 *
 * @package Settings\Mvc\Controller
 */
class SettingsController extends AbstractActionController
{
    use SettingsTrait;

    public function __construct()
    {
        $this->setFormName(DomPdfSettings::class)
            ->setConfigKey('uthando_dompdf');
    }
}
