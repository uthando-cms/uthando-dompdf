<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Form;

use UthandoDomPdf\Model\PdfTextLineFont;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;


/**
 * Class PdfTextLineFontFieldSet
 *
 * @package UthandoDomPdf\Form
 */
class PdfTextLineFontFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setObject(new PdfTextLineFont())
            ->setHydrator(new ClassMethods());
    }

    /**
     * Set up elements
     */
    public function init()
    {
        $this->add([
            'name' => 'family',
            'type' => 'text',
            'options' => [
                'label' => 'Font Family',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'weight',
            'type' => 'select',
            'options' => [
                'label' => 'Font Weight',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'normal' => 'Normal',
                    'bold' => 'Bold',
                    'italic' => 'Italic',
                    'bold_italic' => 'Bold Italic',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'size',
            'type' => 'number',
            'options' => [
                'label' => 'Font Size',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'family' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'weight' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'size' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
        ];
    }
}
