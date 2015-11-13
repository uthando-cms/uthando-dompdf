<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DOMPDF;

/**
 * Class DomPdfFactory
 *
 * @package UthandoDomPdf\Service
 */
class DomPdfFactory implements FactoryInterface
{
    /**
     * An array of keys that map DOMPDF define keys to DOMPDFModule config's
     * keys.
     * 
     * @var array
     */
    private static $configCompatMapping = array(
        'dir'                       => 'DOMPDF_DIR',
        'inc_dir'                   => 'DOMPDF_INC_DIR',
        'lib_dir'                   => 'DOMPDF_LIB_DIR',
        'enable_autoload'           => 'DOMPDF_ENABLE_AUTOLOAD',
        'autoload_prepend'          => 'DOMPDF_AUTOLOAD_PREPEND',
        'admin_username'            => 'DOMPDF_ADMIN_USERNAME',
        'admin_password'            => 'DOMPDF_ADMIN_PASSWORD',
        'font_directory'            => 'DOMPDF_FONT_DIR',
        'font_cache_directory'      => 'DOMPDF_FONT_CACHE',
        'temporary_directory'       => 'DOMPDF_TEMP_DIR',
        'chroot'                    => 'DOMPDF_CHROOT',
        'unicode_enabled'           => 'DOMPDF_UNICODE_ENABLED',
        'enable_fontsubsetting'     => 'DOMPDF_ENABLE_FONTSUBSETTING',
        'pdf_backend'               => 'DOMPDF_PDF_BACKEND',
        'default_media_type'        => 'DOMPDF_DEFAULT_MEDIA_TYPE',
        'default_paper_size'        => 'DOMPDF_DEFAULT_PAPER_SIZE',
        'default_font'              => 'DOMPDF_DEFAULT_FONT',
        'dpi'                       => 'DOMPDF_DPI',
        'enable_php'                => 'DOMPDF_ENABLE_PHP',
        'enable_javascript'         => 'DOMPDF_ENABLE_JAVASCRIPT',
        'enable_remote'             => 'DOMPDF_ENABLE_REMOTE',
        'log_output_file'           => 'DOMPDF_LOG_OUTPUT_FILE',
        'font_height_ratio'         => 'DOMPDF_FONT_HEIGHT_RATIO',
        'enable_css_float'          => 'DOMPDF_ENABLE_CSS_FLOAT',
        'enable_html5parser'        => 'DOMPDF_ENABLE_HTML5PARSER',
        'debug_png'                 => 'DEBUGPNG',
        'debug_keep_temp'           => 'DEBUGKEEPTEMP',
        'debug_css'                 => 'DEBUGCSS',
        'debug_layout'              => 'DEBUG_LAYOUT',
        'debug_layout_lines'        => 'DEBUG_LAYOUT_LINES',
        'debug_layout_blocks'       => 'DEBUG_LAYOUT_BLOCKS',
        'debug_layout_inline'       => 'DEBUG_LAYOUT_INLINE',
        'debug_layout_padding_box'  => 'DEBUG_LAYOUT_PADDINGBOX'
    );
    
    /**
     * Creates an instance of DOMPDF.
     * 
     * @param  ServiceLocatorInterface $serviceLocator 
     * @return DOMPDF
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var \UthandoDomPdf\Options\DomPdfOptions $config */
        $config = $serviceLocator->get('DomPdfOptions');
        $config = $config->toArray();
        
        foreach ($config as $key => $value) {
            if (! array_key_exists($key, static::$configCompatMapping)) {
                continue;
            }

            if (defined(static::$configCompatMapping[$key])) {
                continue;
            }
            
            define(static::$configCompatMapping[$key], $value);
        }
		
        require_once DOMPDF_LIB_DIR . '/html5lib/Parser.php';
        require_once DOMPDF_INC_DIR . '/functions.inc.php';
        require_once __DIR__ . '/../../../config/module.compat.php';
        
        return new DOMPDF();
    }
}
