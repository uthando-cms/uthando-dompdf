<?php

namespace UthandoDomPdfTest\Service;

use UthandoDomPdfTest\Framework\TestCase;

class DomPdfServiceTest extends TestCase
{
    public function testCanCreateInstanceFromServiceManager()
    {
        $model = $this->serviceManager->get('dompdf');
        $this->assertInstanceOf('DOMPDF', $model);
    }

    public function testUniqueInstancesFromFactory()
    {
        $dompdfInstance1 = $this->serviceManager->get('dompdf');
        $dompdfInstance2 = $this->serviceManager->get('dompdf');
        
        $this->assertNotSame($dompdfInstance1, $dompdfInstance2);
    }
}
