<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{

    use RefreshDatabase;

    private $serie;

    protected function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie('Serie que será Removida', 1, 2);

    }

    public function testRemoverUmaSerie()
    {
        //testa se o db possui a série.
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        //instancia do removedor de serie
        $removedorDeSerie = new RemovedorDeSerie();
        //o retorno do removedor de série se ocorrer tudo certo é o próprio nome da série...
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
        //testa se o dado retornado é uma string(pois o nome da série é string)
        $this->assertIsString($nomeSerie);
        //testa se o nome da série retornado é o mesmo da série que estáva instanciada
        $this->assertEquals('Serie que será Removida', $this->serie->nome);
        //testa se a serie foi realmente excluída do db procurando pelo id.
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }

}
