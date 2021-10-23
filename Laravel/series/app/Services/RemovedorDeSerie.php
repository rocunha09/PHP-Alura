<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\{Episodio, serie, Temporada};

class RemovedorDeSerie
{
    public function removerSerie(int $idSerie): string
    {
         //devido ao relacionamento deve-se realizar o destroy em cascata, 
        //neste caso será realizado manualmente.

        //primeiro acessar a série, a temporada, apagar os episódios de cada temporada
        // e remover cada temporada em seguida para então remover a série
        $nomeSerie = '';
        DB::transaction(function() use ($idSerie, &$nomeSerie){
            $serie = Serie::find($idSerie);
            $nomeSerie = $serie->nome;
            $serie->temporadas->each(function(Temporada $temporada){
                $temporada->episodios->each(function(Episodio $ep){
                    $ep->delete();
                });
                $temporada->delete();
            });
    
            $serie->delete();       

        });
        return $nomeSerie;
        
    }
}