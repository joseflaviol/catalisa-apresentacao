<?php

namespace App;

use App\Dto\CriaLivroDto;
use App\Exception\LivroRepetidoException;
use App\Interface\RepositorioDeLivros;

class GerenciadorDeLivros
{
    public function __construct(
        private RepositorioDeLivros $repositorioDeLivros
    ) {}

    public function insereLivro(CriaLivroDto $criaLivroDto)
    {
        if (!$this->repositorioDeLivros->podeInserir($criaLivroDto->titulo, $criaLivroDto->autor)) {
            throw new LivroRepetidoException;
        }

        $livro = Livro::novo($criaLivroDto->titulo, $criaLivroDto->autor);

        return $this->repositorioDeLivros->salva($livro);
    }
}
