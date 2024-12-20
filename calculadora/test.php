<?php

use App\Calculadora;
use App\SomadorIterativo;
use App\SomadorNormal;

require __DIR__ . '/vendor/autoload.php';

$somadorNormal = new SomadorNormal();
$somadorIterativo = new SomadorIterativo();

$calculadora = new Calculadora(
    $somadorIterativo
);

echo $calculadora->soma(1, 4);