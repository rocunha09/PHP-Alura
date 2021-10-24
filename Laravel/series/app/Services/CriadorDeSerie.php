<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie extends Model
{
    private function criarEp(int $episodios, $temporada): void
    {
        for($j = 1; $j <= $episodios; $j++){
            $temporada->episodios()->create([
                'numero' => $j
            ]);
        }
    }

    private function criarTemp(int $episodios, int $qtdTemporadas, Serie $serie): void
    {
        for($i = 1; $i <= $qtdTemporadas; $i++){
            $temporada =  $serie->temporadas()->create([
                'numero' => $i
            ]);

            $this->criarEp($episodios, $temporada);
        }
    }

    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $episodios): Serie
    {
        $serie = null;

        DB::beginTransaction();  /* fazendo desta forma simplifica o uso de transaction*/
        $serie = Serie::create([
            'nome' => $nomeSerie
        ]);

        $this->criarTemp($episodios, $qtdTemporadas, $serie);
        DB::commit(); /* DB:rollback poderia ser usado caso a transaction falhasse*/

       return $serie;
    }
}
/*
 * DB::transaction gerencia os casos de erro automaticamente, fazendo rollback em caso de erro.
 * Utilizando DB::beginTransaction e DB::commit, não é preciso conhecer funções anônimas e
 * suas particularidades de escopo.
 *
 * */
