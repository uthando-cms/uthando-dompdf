<?php

namespace UthandoDomPdfTest\Framework;

use UthandoDomPdfTest\Bootstrap;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $serviceManager;

    protected function setUp()
    {
        $this->serviceManager = Bootstrap::getServiceManager();
    }
}