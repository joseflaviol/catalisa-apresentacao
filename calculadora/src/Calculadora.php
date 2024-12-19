<?php

namespace App;

use App\Interface\Somador;

class Calculadora
{
    public function __construct(
        private Somador $somador
    ) {}

    public function soma(int $a, int $b)
    {
        return $this->somador->soma($a, $b);
    }
}
