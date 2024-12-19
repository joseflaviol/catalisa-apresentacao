<?php

namespace App;

use App\Interface\Somador;

class SomadorIterativo implements Somador
{
    public function soma(int $a, int $b): int
    {
        $soma = $a;

        while ($b > 0) {
            $a++;
            $b--;
        }

        return $soma;
    }
}
