<?php

namespace App\Interface;

use App\Livro;

interface RepositorioDeLivros
{
    function salva(Livro $livro): Livro;
    function buscaLivroPorId(int $id): ?Livro;
    function removeLivroPorId(int $id): void;
    function podeInserir(string $titulo, string $autor): bool;
}
