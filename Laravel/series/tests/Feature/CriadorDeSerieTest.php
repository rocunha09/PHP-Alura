<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    /*
     * para teste de bancos de dados serem realizados sem que afetem a aplicação e seu banco de dados original
     * usa-se a trait RefreshDatabase, e um novo arquivo de configuração chamado .env.testing
     * este arquivo e a trait trabalharão juntos criando uma configuração de banco de dados para teste
     * e realizando refresh em um banco temporário que existirá durante o teste apenas, (em memória), evitando assim
     * que o banco de dados da aplicação seja afetado. [esta funcionalidade foi fornecida para uso da aplicação pelo
     * sqlite.
     */
    use RefreshDatabase;

    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Serie Test';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);


    }
}
