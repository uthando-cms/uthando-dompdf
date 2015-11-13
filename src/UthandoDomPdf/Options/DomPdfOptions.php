<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class DomPdfOptions
 *
 * @package UthandoDomPdf\Options
 */
class DomPdfOptions extends AbstractOptions
{
    /**
     * The root of your DOMPDF installation
     *
     * @var string
     */
    protected $dir = './vendor/dompdf/dompdf';

    /**
     * The location of the DOMPDF include directory
     *
     * @var string
     */
    protected $incDir = './vendor/dompdf/dompdf/include';

    /**
     * The location of the DOMPDF lib directory
     *
     * @var string
     */
    protected $libDir = './vendor/dompdf/dompdf/lib';

    /**
     * Enable the built in DOMPDF autoloader
     *
     * @var bool
     */
    protected $enableAutoload = false;

    /**
     * Prepend the DOMPDF autoload function to the spl_autoload stack
     *
     * @var bool
     */
    protected $autoloadPrepend = false;

    /**
     * Username used by the configuration utility in www/
     *
     * @var string
     */
    protected $adminUsername = 'user';

    /**
     * Password used by the configuration utility in www/
     *
     * @var string
     */
    protected $adminPassword = 'password';

    /**
     * The location of the DOMPDF font directory
     *
     * If DOMPDF_FONT_DIR identical to DOMPDF_FONT_CACHE or user executing DOMPDF from the CLI,
     * this directory must be writable by the webserver process ().
     * *Please note the trailing slash.*
     *
     * Notes regarding fonts:
     * Additional .afm font metrics can be added by executing load_font.php from command line.
     *
     * Only the original "Base 14 fonts" are present on all pdf viewers. Additional fonts must
     * be embedded in the pdf file or the PDF may not display correctly. This can significantly
     * increase file size and could violate copyright provisions of a font. Font subsetting is
     * not currently supported.
     *
     * Any font specification in the source HTML is translated to the closest font available
     * in the font directory.
     *
     * The pdf standard "Base 14 fonts" are:
     * Courier, Courier-Bold, Courier-BoldOblique, Courier-Oblique,
     * Helvetica, Helvetica-Bold, Helvetica-BoldOblique, Helvetica-Oblique,
     * Times-Roman, Times-Bold, Times-BoldItalic, Times-Italic,
     * Symbol,
     * ZapfDingbats,
     *
     * *Please note the trailing slash.*
     *
     * @var string
     */
    protected $fontDirectory = './vendor/dompdf/dompdf/lib/fonts/';

    /**
     * The location of the DOMPDF font cache directory
     *
     * Note this directory must be writable by the webserver process
     * This folder must already exist!
     * It contains the .afm files, on demand parsed, converted to php syntax and cached
     * This folder can be the same as DOMPDF_FONT_DIR
     *
     * @var string
     */
    protected $fontCacheDirectory = './vendor/dompdf/dompdf/lib/fonts/';

    /**
     * The location of a temporary directory.
     *
     * The directory specified must be writeable by the webserver process.
     * The temporary directory is required to download remote images and when
     * using the PFDLib back end.
     *
     * @var string
     */
    protected $temporaryDirectory;

    /**
     * ==== IMPORTANT ====
     *
     * dompdf's "chroot": Prevents dompdf from accessing system files or other
     * files on the webserver.  All local files opened by dompdf must be in a
     * subdirectory of this directory.  DO NOT set it to '/' since this could
     * allow an attacker to use dompdf to read any files on the server.  This
     * should be an absolute path.
     * This is only checked on command line call by dompdf.php, but not by
     * direct class use like:
     * $dompdf = new DOMPDF();    $dompdf->load_html($htmldata); $dompdf->render(); $pdfdata = $dompdf->output();
     *
     * @var string
     */
    protected $chroot = './vendor/dompdf/dompdf/';

    /**
     * Whether to use Unicode fonts or not.
     *
     * When set to true the PDF backend must be set to "CPDF" and fonts must be
     * loaded via load_font.php.
     *
     * When enabled, dompdf can support all Unicode glyphs.  Any glyphs used in a
     * document must be present in your fonts, however.
     *
     * @var bool
     */
    protected $unicodeEnabled = true;

    /**
     * Whether to make font subsetting or not.
     *
     * @var bool
     */
    protected $enableFontsubsetting = false;

    /**
     * The PDF rendering backend to use
     *
     * Valid settings are 'PDFLib', 'CPDF' (the bundled R&OS PDF class), 'GD' and
     * 'auto'.  'auto' will look for PDFLib and use it if found, or if not it will
     * fall back on CPDF.  'GD' renders PDFs to graphic files.  {@link
     * Canvas_Factory} ultimately determines which rendering class to instantiate
     * based on this setting.
     *
     * Both PDFLib & CPDF rendering backends provide sufficient rendering
     * capabilities for dompdf, however additional features (e.g. object,
     * image and font support, etc.) differ between backends.  Please see
     * {@link PDFLib_Adapter} for more information on the PDFLib backend
     * and {@link CPDF_Adapter} and lib/class.pdf.php for more information
     * on CPDF.  Also see the documentation for each backend at the links
     * below.
     *
     * The GD rendering backend is a little different than PDFLib and
     * CPDF.  Several features of CPDF and PDFLib are not supported or do
     * not make any sense when creating image files.  For example,
     * multiple pages are not supported, nor are PDF 'objects'.  Have a
     * look at {@link GD_Adapter} for more information.  GD support is new
     * and experimental, so use it at your own risk.
     *
     * @link http://www.pdflib.com
     * @link http://www.ros.co.nz/pdf
     * @link http://www.php.net/image
     *
     * @var string
     */
    protected $pdfBackend = 'CPDF';

    /**
     * PDFlib license key
     *
     * If you are using a licensed, commercial version of PDFlib, specify
     * your license key here.  If you are using PDFlib-Lite or are evaluating
     * the commercial version of PDFlib, comment out this setting.
     *
     * @link http://www.pdflib.com
     *
     * If pdflib present in web server and auto or selected explicitely above,
     * a real license code must exist!
     *
     * @var string
     */
    protected $pdflibLicense;

    /**
     * html target media view which should be rendered into pdf.
     * List of types and parsing rules for future extensions:
     * http://www.w3.org/TR/REC-html40/types.html
     *   screen, tty, tv, projection, handheld, print, braille, aural, all
     * Note: aural is deprecated in CSS 2.1 because it is replaced by speech in CSS 3.
     * Note, even though the generated pdf file is intended for print output,
     * the desired content might be different (e.g. screen or projection view of html file).
     * Therefore allow specification of content here.
     *
     * @var string
     */
    protected $defaultMediaType = 'screen';

    /**
     * The default paper size.
     *
     * North America standard is "letter"; other countries generally "a4"
     *
     * @see CPDF_Adapter::PAPER_SIZES for valid sizes
     *
     * @var string
     */
    protected $defaultPaperSize = 'letter';

    /**
     * The default font family
     *
     * Used if no suitable fonts can be found. This must exist in the font folder.
     *
     * @var string
     */
    protected $defaultFont = 'serif';

    /**
     * Image DPI setting
     *
     * This setting determines the default DPI setting for images and fonts.  The
     * DPI may be overridden for inline images by explictly setting the
     * image's width & height style attributes (i.e. if the image's native
     * width is 600 pixels and you specify the image's width as 72 points,
     * the image will have a DPI of 600 in the rendered PDF.  The DPI of
     * background images can not be overridden and is controlled entirely
     * via this parameter.
     *
     * For the purposes of DOMPDF, pixels per inch (PPI) = dots per inch (DPI).
     * If a size in html is given as px (or without unit as image size),
     * this tells the corresponding size in pt.
     * This adjusts the relative sizes to be similar to the rendering of the
     * html page in a reference browser.
     *
     * In pdf, always 1 pt = 1/72 inch
     *
     * Rendering resolution of various browsers in px per inch:
     * Windows Firefox and Internet Explorer:
     *   SystemControl->Display properties->FontResolution: Default:96, largefonts:120, custom:?
     * Linux Firefox:
     *   about:config *resolution: Default:96
     *   (xorg screen dimension in mm and Desktop font dpi settings are ignored)
     *
     * Take care about extra font/image zoom factor of browser.
     *
     * In images, <img> size in pixel attribute, img css style, are overriding
     * the real image dimension in px for rendering.
     *
     * @var int
     */
    protected $dpi = 96;

    /**
     * Enable inline PHP
     *
     * If this setting is set to true then DOMPDF will automatically evaluate
     * inline PHP contained within <script type="text/php"> ... </script> tags.
     *
     * Enabling this for documents you do not trust (e.g. arbitrary remote html
     * pages) is a security risk.  Set this option to false if you wish to process
     * untrusted documents.
     *
     * @var bool
     */
    protected $enablePhp = false;

    /**
     * Enable inline Javascript
     *
     * If this setting is set to true then DOMPDF will automatically insert
     * JavaScript code contained within <script type="text/javascript"> ... </script> tags.
     *
     * @var bool
     */
    protected $enableJavascript = true;

    /**
     * Enable remote file access
     *
     * If this setting is set to true, DOMPDF will access remote sites for
     * images and CSS files as required.
     * This is required for part of test case www/test/image_variants.html through www/examples.php
     *
     * Attention!
     * This can be a security risk, in particular in combination with DOMPDF_ENABLE_PHP and
     * allowing remote access to dompdf.php or on allowing remote html code to be passed to
     * $dompdf = new DOMPDF(); $dompdf->load_html(...);
     * This allows anonymous users to download legally doubtful internet content which on
     * tracing back appears to being downloaded by your server, or allows malicious php code
     * in remote html pages to be executed by your server with your account privileges.
     *
     * @var bool
     */
    protected $enableRemote = false;

    /**
     * The debug output log
     *
     * @var string
     */
    protected $logOutputFile = './data/dompdf/log';

    /**
     * A ratio applied to the fonts height to be more like browsers' line height
     *
     * @var float
     */
    protected $fontHeightRatio = 1.1;

    /**
     * Enable CSS float
     *
     * Allows people to disabled CSS float support
     * @var bool
     */
    protected $enableCssFloat = false;

    /**
     * Use the more-than-experimental HTML5 Lib parser
     *
     * @var bool
     */
    protected $enableHtml5parser = false;

    /**
     * Debug PNG images
     *
     * @var bool
     */
    protected $debugPng = false;

    /**
     * Keep temporary image files
     *
     * @var bool
     */
    protected $debugKeepTemp = false;

    /**
     * Debug CSS
     *
     * @var bool
     */
    protected $debugCss = false;

    /**
     * Debug layout
     *
     * @var bool
     */
    protected $debugLayout = false;

    /**
     * Debug text lines layout
     *
     * @var bool
     */
    protected $debugLayoutLines = false;

    /**
     * Debug block elements layout
     *
     * @var bool
     */
    protected $debugLayoutBlocks = false;

    /**
     * Debug inline elements layout
     *
     * @var bool
     */
    protected $debugLayoutInline = false;

    /**
     * Debug padding boxes layout
     *
     * @var bool
     */
    protected $debugLayoutPaddingBox = false;

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     * @return $this
     */
    public function setDir($dir)
    {
        if ($dir) {
            $this->dir = $dir;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getIncDir()
    {
        return $this->incDir;
    }

    /**
     * @param string $incDir
     * @return $this
     */
    public function setIncDir($incDir)
    {
        $this->incDir = $incDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getLibDir()
    {
        return $this->libDir;
    }

    /**
     * @param string $libDir
     * @return $this
     */
    public function setLibDir($libDir)
    {
        $this->libDir = $libDir;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableAutoload()
    {
        return $this->enableAutoload;
    }

    /**
     * @param boolean $enableAutoload
     * @return $this
     */
    public function setEnableAutoload($enableAutoload)
    {
        $this->enableAutoload = (bool) $enableAutoload;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getAutoloadPrepend()
    {
        return $this->autoloadPrepend;
    }

    /**
     * @param boolean $autoloadPrepend
     * @return $this
     */
    public function setAutoloadPrepend($autoloadPrepend)
    {
        $this->autoloadPrepend = $autoloadPrepend;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdminUsername()
    {
        return $this->adminUsername;
    }

    /**
     * @param string $adminUsername
     * @return $this
     */
    public function setAdminUsername($adminUsername)
    {
        $this->adminUsername = $adminUsername;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    /**
     * @param string $adminPassword
     * @return $this
     */
    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getFontDirectory()
    {
        return $this->fontDirectory;
    }

    /**
     * @param string $fontDirectory
     * @return $this
     */
    public function setFontDirectory($fontDirectory)
    {
        $this->fontDirectory = $fontDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getFontCacheDirectory()
    {
        return $this->fontCacheDirectory;
    }

    /**
     * @param string $fontCacheDirectory
     * @return $this
     */
    public function setFontCacheDirectory($fontCacheDirectory)
    {
        $this->fontCacheDirectory = $fontCacheDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemporaryDirectory()
    {
        return $this->temporaryDirectory;
    }

    /**
     * @param string $temporaryDirectory
     * @return $this
     */
    public function setTemporaryDirectory($temporaryDirectory)
    {
        if (!is_writable($temporaryDirectory)) {
            $temporaryDirectory = sys_get_temp_dir();
        }
        $this->temporaryDirectory = $temporaryDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getChroot()
    {
        return realpath($this->chroot);
    }

    /**
     * @param string $chroot
     * @return $this
     */
    public function setChroot($chroot)
    {
        $this->chroot = $chroot;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getUnicodeEnabled()
    {
        return $this->unicodeEnabled;
    }

    /**
     * @param boolean $unicodeEnabled
     * @return $this
     */
    public function setUnicodeEnabled($unicodeEnabled)
    {
        $this->unicodeEnabled = $unicodeEnabled;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableFontsubsetting()
    {
        return $this->enableFontsubsetting;
    }

    /**
     * @param boolean $enableFontsubsetting
     * @return $this
     */
    public function setEnableFontsubsetting($enableFontsubsetting)
    {
        $this->enableFontsubsetting = (bool)$enableFontsubsetting;
        return $this;
    }

    /**
     * @return string
     */
    public function getPdfBackend()
    {
        return $this->pdfBackend;
    }

    /**
     * @param string $pdfBackend
     * @return $this
     */
    public function setPdfBackend($pdfBackend)
    {
        $this->pdfBackend = $pdfBackend;
        return $this;
    }

    /**
     * @return string
     */
    public function getPdflibLicense()
    {
        return $this->pdflibLicense;
    }

    /**
     * @param string $pdflibLicense
     * @return $this
     */
    public function setPdflibLicense($pdflibLicense)
    {
        $this->pdflibLicense = $pdflibLicense;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultMediaType()
    {
        return $this->defaultMediaType;
    }

    /**
     * @param string $defaultMediaType
     * @return $this
     */
    public function setDefaultMediaType($defaultMediaType)
    {
        $this->defaultMediaType = $defaultMediaType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultPaperSize()
    {
        return $this->defaultPaperSize;
    }

    /**
     * @param string $defaultPaperSize
     * @return $this
     */
    public function setDefaultPaperSize($defaultPaperSize)
    {
        $this->defaultPaperSize = $defaultPaperSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultFont()
    {
        return $this->defaultFont;
    }

    /**
     * @param string $defaultFont
     * @return $this
     */
    public function setDefaultFont($defaultFont)
    {
        $this->defaultFont = $defaultFont;
        return $this;
    }

    /**
     * @return int
     */
    public function getDpi()
    {
        return $this->dpi;
    }

    /**
     * @param int $dpi
     * @return $this
     */
    public function setDpi($dpi)
    {
        $this->dpi = $dpi;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnablePhp()
    {
        return $this->enablePhp;
    }

    /**
     * @param boolean $enablePhp
     * @return $this
     */
    public function setEnablePhp($enablePhp)
    {
        $this->enablePhp = (bool) $enablePhp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableJavascript()
    {
        return $this->enableJavascript;
    }

    /**
     * @param boolean $enableJavascript
     * @return $this
     */
    public function setEnableJavascript($enableJavascript)
    {
        $this->enableJavascript = (bool) $enableJavascript;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableRemote()
    {
        return $this->enableRemote;
    }

    /**
     * @param boolean $enableRemote
     * @return $this
     */
    public function setEnableRemote($enableRemote)
    {
        $this->enableRemote = (bool) $enableRemote;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogOutputFile()
    {
        return $this->logOutputFile;
    }

    /**
     * @param string $logOutputFile
     * @return $this
     */
    public function setLogOutputFile($logOutputFile)
    {
        $this->logOutputFile = $logOutputFile;
        return $this;
    }

    /**
     * @return float
     */
    public function getFontHeightRatio()
    {
        return $this->fontHeightRatio;
    }

    /**
     * @param float $fontHeightRatio
     * @return $this
     */
    public function setFontHeightRatio($fontHeightRatio)
    {
        $this->fontHeightRatio = (float) $fontHeightRatio;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableCssFloat()
    {
        return $this->enableCssFloat;
    }

    /**
     * @param boolean $enableCssFloat
     * @return $this
     */
    public function setEnableCssFloat($enableCssFloat)
    {
        $this->enableCssFloat = (bool) $enableCssFloat;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableHtml5parser()
    {
        return $this->enableHtml5parser;
    }

    /**
     * @param boolean $enableHtml5parser
     * @return $this
     */
    public function setEnableHtml5parser($enableHtml5parser)
    {
        $this->enableHtml5parser = (bool) $enableHtml5parser;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugPng()
    {
        return $this->debugPng;
    }

    /**
     * @param boolean $debugPng
     * @return $this
     */
    public function setDebugPng($debugPng)
    {
        $this->debugPng = (bool) $debugPng;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugKeepTemp()
    {
        return $this->debugKeepTemp;
    }

    /**
     * @param boolean $debugKeepTemp
     * @return $this
     */
    public function setDebugKeepTemp($debugKeepTemp)
    {
        $this->debugKeepTemp = (bool) $debugKeepTemp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugCss()
    {
        return $this->debugCss;
    }

    /**
     * @param boolean $debugCss
     * @return $this
     */
    public function setDebugCss($debugCss)
    {
        $this->debugCss = (bool) $debugCss;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugLayout()
    {
        return $this->debugLayout;
    }

    /**
     * @param boolean $debugLayout
     * @return $this
     */
    public function setDebugLayout($debugLayout)
    {
        $this->debugLayout = (bool) $debugLayout;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugLayoutLines()
    {
        return $this->debugLayoutLines;
    }

    /**
     * @param boolean $debugLayoutLines
     * @return $this
     */
    public function setDebugLayoutLines($debugLayoutLines)
    {
        $this->debugLayoutLines = (bool) $debugLayoutLines;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugLayoutBlocks()
    {
        return $this->debugLayoutBlocks;
    }

    /**
     * @param boolean $debugLayoutBlocks
     * @return $this
     */
    public function setDebugLayoutBlocks($debugLayoutBlocks)
    {
        $this->debugLayoutBlocks = (bool) $debugLayoutBlocks;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugLayoutInline()
    {
        return $this->debugLayoutInline;
    }

    /**
     * @param boolean $debugLayoutInline
     * @return $this
     */
    public function setDebugLayoutInline($debugLayoutInline)
    {
        $this->debugLayoutInline = (bool) $debugLayoutInline;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDebugLayoutPaddingBox()
    {
        return $this->debugLayoutPaddingBox;
    }

    /**
     * @param boolean $debugLayoutPaddingBox
     * @return $this
     */
    public function setDebugLayoutPaddingBox($debugLayoutPaddingBox)
    {
        $this->debugLayoutPaddingBox = (bool) $debugLayoutPaddingBox;
        return $this;
    }
}
