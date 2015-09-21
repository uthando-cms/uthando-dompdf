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
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class DomPdfOptionsFieldSet
 *
 * @package Settings\Form
 */
class DomPdfOptionsFieldSet extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods())
            ->setObject(new DomPdfOptions());
    }

    public function init()
    {
        $this->add([
            'name' => 'dir',
            'type' => 'text',
            'options'       => [
                'label' => 'DOMPDF Install Directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'readonly' => true,
            ],
        ]);

        $this->add([
            'name' => 'inc_dir',
            'type' => 'text',
            'options'       => [
                'label' => 'DOMPDF Include directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'readonly' => true,
            ],
        ]);

        $this->add([
            'name' => 'lib_dir',
            'type' => 'text',
            'options'       => [
                'label' => 'DOMPDF Library Directory',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'readonly' => true,
            ],
        ]);

        $this->add([
            'name'			=> 'enable_autoload',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'DOMPDF Autoloader',
                'disable_inarray_validator' => true,
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'Disabled',
                        'disabled' => true,
                        'selected' => true,
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
                        'label' => 'Enabled',
                        'disabled' => true,
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
            'name'			=> 'autoload_prepend',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Prepend to Autoloader',
                'disable_inarray_validator' => true,
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'disabled' => true,
                        'selected' => true,
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
                        'label' => 'Yes',
                        'disabled' => true,
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
            'name' => 'admin_username',
            'type' => 'text',
            'options'       => [
                'label' => 'Admin Username',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'readonly' => true,
            ],
        ]);

        $this->add([
            'name' => 'admin_password',
            'type' => 'text',
            'options'       => [
                'label' => 'Admin password',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
            'attributes' => [
                'readonly' => true,
            ],
        ]);

        $this->add([
            'name' => 'font_directory',
            'type' => 'text',
            'options'       => [
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
            'options'       => [
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
            'options'       => [
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
            'options'       => [
                'label' => 'Chroot',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'unicode_enabled',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable Unicode',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'enable_fontsubsetting',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable Font Subsetting',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'pdf_backend',
            'type'			=> 'select',
            'options'		=> [
                'label'			=> 'PDF Backend',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
                'value_options' => [
                    'auto'      => 'auto',
                    'CPDF'      => 'CPDF',
                    'PDFLib'    => 'PDFLib',
                    'GD'        => 'GD',
                ],
                'column-size' => 'md-8',
            ],
        ]);

        $this->add([
            'name' => 'pdflib_license',
            'type' => 'textarea',
            'options'       => [
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
            'options'       => [
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
            'options'       => [
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
            'options'       => [
                'label' => 'Default Font',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'dpi',
            'type' => 'text',
            'options'       => [
                'label' => 'DPI Setting',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'enable_php',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable PHP',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'enable_javascript',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable JavaScript',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'enable_remote',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable Remote',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'options'       => [
                'label' => 'Debug Log',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name' => 'font_height_ratio',
            'type' => 'text',
            'options'       => [
                'label' => 'Font Height Ratio',
                'column-size' => 'md-8',
                'label_attributes' => [
                    'class' => 'col-md-4',
                ],
            ],
        ]);

        $this->add([
            'name'			=> 'enable_css_float',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable CSS Float',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'enable_html5parser',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Enable HTML5 Parser',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_png',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Dedug PNG',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_keep_temp',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Keep Temp',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_css',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug CSS',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_layout',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Layout',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_layout_lines',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Layout Lines',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_layout_blocks',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Layout Blocks',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_layout_inline',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Layout Inline',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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
            'name'			=> 'debug_layout_padding_box',
            'type'			=> 'radio',
            'options'		=> [
                'label'			=> 'Debug Layout Padding Box',
                'value_options' => [
                    [
                        'value' => '0',
                        'label' => 'No',
                        'label_attributes' => [
                            'class' => 'col-md-12',
                        ],

                    ],
                    [
                        'value' => '1',
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

    public function getInputFilterSpecification()
    {
        return [
            'enable_autoload' => [
                'required' => false,
            ],
            'autoload_prepend' => [
                'required' => false,
            ]
        ];
    }
}