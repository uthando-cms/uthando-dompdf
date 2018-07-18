<?php

namespace UthandoDomPdfTest\Service;

use Dompdf\Dompdf;
use UthandoDomPdfTest\Framework\TestCase;

class DomPdfServiceTest extends TestCase
{
    public function testCanCreateInstanceFromServiceManager()
    {
        $model = $this->serviceManager->get(Dompdf::class);
        $this->assertInstanceOf(Dompdf::class, $model);
    }

    public function testUniqueInstancesFromFactory()
    {
        $dompdfInstance1 = $this->serviceManager->get(Dompdf::class);
        $dompdfInstance2 = $this->serviceManager->get(Dompdf::class);
        
        $this->assertNotSame($dompdfInstance1, $dompdfInstance2);
    }
}
