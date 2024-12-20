<?php

namespace App;

class Livro
{
    private ?int    $id;
    private  string $titulo;
    private  string $autor;

    private function __construct(
        ?int   $id,
        string $titulo,
        string $autor
    ) {
        $this->id     = $id;
        $this->titulo = $titulo;
        $this->autor  = $autor;
    }

    public static function novo(string $titulo, string $autor)
    {
        return new self(null, $titulo, $autor);
    }

    public static function constroiComId(int $id, string $titulo, string $autor)
    {
        return new self($id, $titulo, $autor);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function titulo(): string
    {
        return $this->titulo;
    }

    public function autor(): string
    {
        return $this->autor;
    }
}
