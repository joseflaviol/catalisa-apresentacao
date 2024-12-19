<?php

namespace Tests;

use App\SomadorNormal;
use PHPUnit\Framework\TestCase;

class SomadorNormalTest extends TestCase
{
    private SomadorNormal $somadorNormal;

    public function setUp(): void
    {
        $this->somadorNormal = new SomadorNormal();
    }

    public function testSomaCorretamente()
    {
        $a = 1;
        $b = 2;

        $resultado = $this->somadorNormal->soma($a, $b);

        $this->assertEquals(3, $resultado);
    }
}
