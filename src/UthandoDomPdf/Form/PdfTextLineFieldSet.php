<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoDomPdf\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Form;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use UthandoDomPdf\Model\PdfTextLine;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class PdfTextLineFieldSet
 *
 * @package UthandoDomPdf\Form
 */
class PdfTextLineFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setObject(new PdfTextLine())
            ->setHydrator(new ClassMethods());
    }

    /**
     * Set up elements
     */
    public function init()
    {
        $this->add([
            'name' => 'text',
            'type' => Text::class,
            'options' => [
                'label' => 'Line Text',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'position',
            'type' => Select::class,
            'options' => [
                'label' => 'Text Position',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'type' => PdfTextLineFontFieldSet::class,
            'name' => 'font',
            'options' => [
                'label' => 'Font',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
            ],
            'attributes' => [
                'class' => 'col-md-12',
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'text' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'position' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
        ];
    }
}
