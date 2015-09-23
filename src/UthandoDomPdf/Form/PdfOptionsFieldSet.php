<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoDomPdf\Form;

use UthandoDomPdf\Options\PdfOptions;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

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

        $this->setHydrator(new ClassMethods())
            ->setObject(new PdfOptions());
    }

    public function init()
    {
        $this->add([
            'name' => 'paper_size',
            'type' => 'text',
            'options'       => [
                'label' => 'Paper Size',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'paper_orientation',
            'type'			=> 'select',
            'options'		=> [
                'label'			=> 'Paper Orientation',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'portrait'   => 'Portrait',
                    'landscape'  => 'Landscape',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'base_path',
            'type' => 'text',
            'options'       => [
                'label' => 'Base Path',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'file_name',
            'type' => 'text',
            'options'       => [
                'label' => 'File Name',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
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