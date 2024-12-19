<?php

namespace App;

use App\Interface\Somador;

class SomadorIterativo implements Somador
{
    public function soma(int $a, int $b): int
    {
        $soma = $a;

        while ($b > 0) {
            $soma++;
            $b--;
        }

        return $soma;
    }
}
