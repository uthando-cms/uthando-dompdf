<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Mvc\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Mvc\Controller;

use UthandoCommon\Controller\SettingsTrait;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class Settings
 *
 * @package Settings\Mvc\Controller
 */
class Settings extends AbstractActionController
{
    use SettingsTrait;

    public function __construct()
    {
        $this->setFormName('DomPdfSettings')
            ->setConfigKey('uthando_dompdf');
    }
}
