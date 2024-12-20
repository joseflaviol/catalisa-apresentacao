<?php

namespace Tests;

use App\Dto\CriaLivroDto;
use App\Exception\LivroRepetidoException;
use App\GerenciadorDeLivros;
use App\Interface\RepositorioDeLivros;
use App\RepositorioDeLivrosEmMemoria;
use DomainException;
use PHPUnit\Framework\TestCase;

class GerenciadorDeLivrosTest extends TestCase
{

    private GerenciadorDeLivros $gerenciadorDeLivros;

    public function setUp(): void
    {
        $this->gerenciadorDeLivros = new GerenciadorDeLivros(
            new RepositorioDeLivrosEmMemoria()
        );
    }

    public function testConsegueInserirLivro()
    {
        // given
        $titulo = "1984";
        $autor  = "George Orwell";
        $dto    = new CriaLivroDto($titulo, $autor);

        // when
        $livro = $this->gerenciadorDeLivros->insereLivro($dto);

        // then
        $this->assertNotNull($livro->id());
        $this->assertEquals($titulo, $livro->titulo());
        $this->assertEquals($autor, $livro->autor());
    }

    public function testNaoInsereLivroRepetido()
    {
        $titulo = "1984";
        $autor  = "George Orwell";
        $dto    = new CriaLivroDto($titulo, $autor);

        /*$repositorioMock = $this->createMock(RepositorioDeLivros::class);

        $repositorioMock->expects($this->once())
            ->method('podeInserir')
            ->with($dto->titulo, $dto->autor)
            ->willReturn(false);

        $gerenciadorDeLivros = new GerenciadorDeLivros($repositorioMock);

        $this->expectException(LivroRepetidoException::class);

        $gerenciadorDeLivros->insereLivro($dto);*/

        $this->gerenciadorDeLivros->insereLivro($dto);

        $this->expectException(LivroRepetidoException::class);

        $this->gerenciadorDeLivros->insereLivro($dto);
    }
}
