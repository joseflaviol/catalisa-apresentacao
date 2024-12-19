<?php

namespace Tests;

use App\SomadorIterativo;
use PHPUnit\Framework\TestCase;

class SomadorIterativoTest extends TestCase
{
    private SomadorIterativo $somadorIterativo;

    public function setUp(): void
    {
        $this->somadorIterativo = new SomadorIterativo();
    }

    public function testConsegueSomarIterativo()
    {
        $a = 1;
        $b = 2;

        $resultado = $this->somadorIterativo->soma($a, $b);

        $this->assertEquals(3, $resultado);
    }
}
