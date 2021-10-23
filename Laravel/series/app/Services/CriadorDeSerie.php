<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Serie;

class CriadorDeSerie extends Model
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $episodios): Serie
    {
        $nome = $nomeSerie;
        $serie = Serie::create([
            'nome' => $nome
        ]);

        for($i = 1; $i <= $qtdTemporadas; $i++){
           $temporada =  $serie->temporadas()->create([
                'numero' => $i
            ]);

            for($j = 1; $j <= $episodios; $j++){
                $temporada->episodios()->create([
                    'numero' => $j
                ]);
            }
        }

       return $serie;
    }
}