<?php

namespace UthandoDomPdfTest\Service;

use UthandoDomPdfTest\Framework\TestCase;

class DomPdfServiceTest extends TestCase
{
    public function testCanCreateInstanceFromServiceManager()
    {
        $model = $this->getServiceManager()->get('dompdf');
        $this->assertInstanceOf('DOMPDF', $model);
    }

    public function testUniqueInstancesFromFactory()
    {
        $dompdfInstance1 = $this->getServiceManager()->get('dompdf');
        $dompdfInstance2 = $this->getServiceManager()->get('dompdf');
        
        $this->assertNotSame($dompdfInstance1, $dompdfInstance2);
    }
}
