<?php

namespace App;

use App\Interface\Somador;

class Calculadora
{
    private Somador $somador;

    public function __construct(
        Somador $somador
    ) {
        $this->somador = $somador;
    }

    public function soma(int $a, int $b)
    {
        return $this->somador->soma($a, $b);
    }
}
