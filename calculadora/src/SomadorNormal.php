<?php

namespace App;

use App\Interface\Somador;

class SomadorNormal implements Somador
{
    public function soma(int $a, int $b): int
    {
        return $a + $b;
    }
}
