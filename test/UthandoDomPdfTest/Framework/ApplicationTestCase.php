<?php

namespace UthandoDomPdfTest\Framework;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ApplicationTestCase extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    protected $overrides = false;

    protected function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../TestConfig.php'
        );
        parent::setUp();
    }
}
