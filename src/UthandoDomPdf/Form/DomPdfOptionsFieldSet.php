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

use UthandoDomPdf\Options\DomPdfOptions;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods;

/**
 * Class DomPdfOptionsFieldSet
 *
 * @package Settings\Form
 */
class DomPdfOptionsFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @param null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods())
            ->setObject(new DomPdfOptions());
    }

    /**
     * Set up form elements
     */
    public function init()
    {
        $this->add([
            'name' => 'font_directory',
            'type' => 'text',
            'options' => [
                'label' => 'Font Directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'font_cache_directory',
            'type' => 'text',
            'options' => [
                'label' => 'Cache Directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'temporary_directory',
            'type' => 'text',
            'options' => [
                'label' => 'Temp Directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'chroot',
            'type' => 'text',
            'options' => [
                'label' => 'Chroot',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'unicode_enabled',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable Unicode',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_fontsubsetting',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable Font Subsetting',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'pdf_backend',
            'type' => 'select',
            'options' => [
                'label' => 'PDF Backend',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'auto' => 'auto',
                    'CPDF' => 'CPDF',
                    'PDFLib' => 'PDFLib',
                    'GD' => 'GD',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'pdflib_license',
            'type' => 'textarea',
            'options' => [
                'label' => 'PDFLib License',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'default_media_type',
            'type' => 'text',
            'options' => [
                'label' => 'Default Media Type',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'default_paper_size',
            'type' => 'text',
            'options' => [
                'label' => 'Default Paper Size',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'default_font',
            'type' => 'text',
            'options' => [
                'label' => 'Default Font',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'dpi',
            'type' => 'number',
            'options' => [
                'label' => 'DPI Setting',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'min' => '72',
            ]
        ]);

        $this->add([
            'name' => 'enable_php',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable PHP',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_javascript',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable JavaScript',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_remote',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable Remote',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'log_output_file',
            'type' => 'text',
            'options' => [
                'label' => 'Debug Log',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'font_height_ratio',
            'type' => 'number',
            'options' => [
                'label' => 'Font Height Ratio',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'min' => '0',
                'step' => '0.1'
            ]
        ]);

        $this->add([
            'name' => 'enable_css_float',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable CSS Float',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'enable_html5parser',
            'type' => 'radio',
            'options' => [
                'label' => 'Enable HTML5 Parser',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_png',
            'type' => 'radio',
            'options' => [
                'label' => 'Dedug PNG',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_keep_temp',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Keep Temp',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_css',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug CSS',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_layout',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Layout',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_layout_lines',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Layout Lines',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_layout_blocks',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Layout Blocks',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_layout_inline',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Layout Inline',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'debug_layout_padding_box',
            'type' => 'radio',
            'options' => [
                'label' => 'Debug Layout Padding Box',
                'value_options' => [
                    [
                        'value' => 0,
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => 1,
                        'label' => 'Yes',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                ],
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
            'font_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'font_cache_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'temporary_directory' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'chroot' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'unicode_enabled' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_fontsubsetting' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'pdf_backend' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'pdflib_license' => [
                'required' => false,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_media_type' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_paper_size' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'default_font' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'dpi' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'enable_php' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_javascript' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_remote' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'log_output_file' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'font_height_ratio' => [
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
            ],
            'enable_css_float' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'enable_html5parser' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_png' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_keep_temp' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_css' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_lines' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_blocks' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_inline' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
            'debug_layout_padding_box' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                    ['name' => 'Boolean'],
                ],
            ],
        ];
    }
}
