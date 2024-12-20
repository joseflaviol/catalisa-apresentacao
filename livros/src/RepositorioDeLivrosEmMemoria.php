<?php

namespace App;

use App\Exception\LivroRepetidoException;
use App\Interface\RepositorioDeLivros;

class RepositorioDeLivrosEmMemoria implements RepositorioDeLivros
{
    /** @var Livro[] $livros */
    private array $livros;

    public function __construct()
    {
        $this->livros = [];
    }

    private function existeComId(int $id)
    {
        return array_key_exists($id, $this->livros);
    }

    public function salva(Livro $livro): Livro
    {
        if (is_null($livro->id())) {
            return $this->insereLivro($livro);
        }

        return $this->atualizaLivro($livro);
    }

    private function insereLivro(Livro $livro): Livro
    {
        if (!$this->podeInserir($livro->titulo(), $livro->autor())) {
            throw new LivroRepetidoException;
        }

        $id = count(array_keys($this->livros)) + 1;
        $this->livros[$id] = Livro::constroiComId($id, $livro->titulo(), $livro->autor());

        return $this->livros[$id];
    }

    private function atualizaLivro(Livro $livro): Livro
    {
        $this->livros[$livro->id()] = $livro;

        return $livro;
    }

    public function removeLivroPorId(int $id): void
    {
        if (!$this->existeComId($id)) return;

        unset($this->livros);
    }

    public function podeInserir(string $titulo, string $autor): bool
    {
        foreach ($this->livros as $livro) {
            if ($livro->titulo() == $titulo && $livro->autor() == $autor) {
                return false;
            }
        }

        return true;
    }

    public function buscaLivroPorId(int $id): ?Livro
    {
        if (!$this->existeComId($id)) return null;

        return $this->livros[$id];
    }
}
