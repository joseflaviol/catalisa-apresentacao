<?php

namespace App\Dto;

class CriaLivroDto
{
    public function __construct(
        public readonly string $titulo,
        public readonly string $autor
    ) {}
}
