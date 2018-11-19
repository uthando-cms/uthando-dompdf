<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   Settings\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoDomPdf\Form;

use UthandoDomPdf\Options\DomPdfOptions;
use Zend\Filter\Boolean;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Element\Number;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
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
            'type' => Text::class,
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
            'type' => Text::class,
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
            'type' => Text::class,
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
            'type' => Text::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Select::class,
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
            'type' => Textarea::class,
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
            'type' => Text::class,
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
            'type' => Text::class,
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
            'type' => Text::class,
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
            'type' => Number::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Text::class,
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
            'type' => Number::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
            'type' => Radio::class,
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
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'font_cache_directory' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'temporary_directory' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'chroot' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'unicode_enabled' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'enable_fontsubsetting' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'pdf_backend' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'pdflib_license' => [
                'required' => false,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'default_media_type' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'default_paper_size' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'default_font' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'dpi' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'enable_php' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'enable_javascript' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'enable_remote' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'log_output_file' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'font_height_ratio' => [
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
            ],
            'enable_css_float' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'enable_html5parser' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_png' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_keep_temp' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_css' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_layout' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_layout_lines' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_layout_blocks' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_layout_inline' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
            'debug_layout_padding_box' => [
                'required' => false,
                'allow_empty' => true,
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                    ['name' => Boolean::class],
                ],
            ],
        ];
    }
}
