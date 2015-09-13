<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\Model;

/**
 * Class PdfTextLine
 *
 * @package UthandoDomPdf\Model
 */
class PdfTextLine
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var PdfTextLineFont
     */
    protected $font;

    /**
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        if (isset($array['text'])) {
            $this->setText($array['text']);
        }

        if (isset($array['position'])) {
            $this->setPosition($array['position']);
        }

        if (isset($array['font'])) {
            $this->setFont($array['font']);
        }
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return PdfTextLine
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     * @return PdfTextLine
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return PdfTextLineFont
     */
    public function getFont()
    {
        return $this->font;
    }

    /**
     * @param array|PdfTextLineFont $font
     * @return PdfTextLine
     */
    public function setFont($font)
    {
        if ($font instanceof PdfTextLineFont) {
            $this->font = $font;
        } else {
            $this->font = new PdfTextLineFont($font);
        }

        return $this;
    }
}