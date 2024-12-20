<?php

namespace App\Exception;

use Exception;

class LivroRepetidoException extends Exception
{
    public function __construct()
    {
        parent::__construct("Livro repetido");
    }
}
