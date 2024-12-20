<?php

namespace Tests;

use App\Calculadora;
use App\Interface\Somador;
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase
{
    public function criaInstancia(Somador $somador): Calculadora
    {
        return new Calculadora($somador);
    }

    public function testConsegueSomarComMock()
    {
        $a = 1;
        $b = 2;
        $somadorMock = $this->createMock(Somador::class);

        $somadorMock->expects($this->once())
            ->method('soma')
            ->with($a, $b)
            ->willReturn($a + $b);

        $calculadora = $this->criaInstancia($somadorMock);

        $resultado = $calculadora->soma($a, $b);

        $this->assertEquals(3, $resultado);
    }
}
