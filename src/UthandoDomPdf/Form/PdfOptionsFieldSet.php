<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Form;

use TwbBundle\Form\View\Helper\TwbBundleForm;
use UthandoCommon\Hydrator\Strategy\CollectionToArrayStrategy;
use UthandoDomPdf\Options\PdfOptions;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods;

/**
 * Class PdfOptionsFieldSet
 *
 * @package Settings\Form
 */
class PdfOptionsFieldSet extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $hydrator = new ClassMethods();
        $hydrator->addStrategy('header_lines', new CollectionToArrayStrategy());
        $hydrator->addStrategy('footer_lines', new CollectionToArrayStrategy());

        $this->setHydrator($hydrator)
            ->setObject(new PdfOptions());
    }

    public function init()
    {
        $this->add([
            'name' => 'paper_size',
            'type' => 'text',
            'options' => [
                'label' => 'Paper Size',
                'column-size' => 'md-8',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'paper_orientation',
            'type' => 'select',
            'options' => [
                'label' => 'Paper Orientation',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'portrait' => 'Portrait',
                    'landscape' => 'Landscape',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'top_margin',
            'type' => 'number',
            'options' => [
                'label' => 'Top Margin',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'right_margin',
            'type' => 'number',
            'options' => [
                'label' => 'Right Margin',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'bottom_margin',
            'type' => 'number',
            'options' => [
                'label' => 'Bottom Margin',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'left_margin',
            'type' => 'number',
            'options' => [
                'label' => 'Left Margin',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'base_path',
            'type' => 'text',
            'options' => [
                'label' => 'Base Path',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'file_name',
            'type' => 'text',
            'options' => [
                'label' => 'File Name',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'header_lines',
            'options' => [
                'label' => 'Add header lines to PDF',
                'label_options' => [
                    'disable_html_escape' => true,
                ],
                'count' => 0,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => [
                    'type' => PdfTextLineFieldSet::class,
                ],
            ],
            'attributes' => [
                'class' => 'col-md-12',
            ],
        ]);

        $this->add([
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'footer_lines',
            'options' => [
                'label' => 'Add footer lines to PDF',
                'label_options' => [
                    'disable_html_escape' => true,
                ],
                'count' => 0,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => [
                    'type' => PdfTextLineFieldSet::class,
                ],
            ],
            'attributes' => [
                'class' => 'col-md-12',
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'paper_size' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'paper_orientation' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'base_path' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
            'file_name' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'ToNull'],
                ],
            ],
        ];
    }
}
