DOMPDFModule
============

[![Build Status](https://travis-ci.org/uthando-cms/uthando-dompdf.svg?branch=master)](https://travis-ci.org/uthando-cms/uthando-dompdf)

This project is a fork of Raymond Kolbe's ZF2 module, I have adapted it for Uthando CMS but it can be used independently.
The UthandoDomPdf module integrates the DOMPDF library with Zend Framework 2 with minimal
effort on the consumer's end.

## Requirements
  - [Zend Framework 2](http://www.github.com/zendframework/zf2)

## Installation
Installation of UthandoDomPdf uses PHP Composer. For more information about
PHP Composer, please visit the official [PHP Composer site](http://getcomposer.org/).

#### Installation steps

  1. `cd my/project/directory`
  2. create a `composer.json` file with following contents:

     ```json
     {
         "require": {
             "uthando-cms/uthando-dompdf": "dev-master"
         }
     }
     ```
  3. install PHP Composer via `curl -s http://getcomposer.org/installer | php` (on windows, download
     http://getcomposer.org/installer and execute it with PHP)
  4. run `php composer.phar install`
  5. open `my/project/directory/config/application.config.php` and add the following key to your `modules`: 

     ```php
     'UthandoDomPdf',
     ```
#### Configuration options
You can override options via the `dompdf_module` key in your local or global config files. See UthandoDomPdf/config/module.config.php for config options.

## Usage

```php
<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use UthandoDomPdf\View\Model\PdfModel;

class ReportController extends AbstractActionController
{
    public function monthlyReportPdfAction()
    {
        $pdf = new PdfModel();
        $pdf->setOption('filename', 'monthly-report'); // Triggers PDF download, automatically appends ".pdf"
        $pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
        $pdf->setOption('paperOrientation', 'landscape'); // Defaults to "portrait"
        
        // To set view variables
        $pdf->setVariables(array(
          'message' => 'Hello'
        ));
        
        return $pdf;
    }
}
```

## To-do
  - Add command line support.
