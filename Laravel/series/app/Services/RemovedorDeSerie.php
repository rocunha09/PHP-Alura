<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\{Episodio, Serie, Temporada};
use Illuminate\Support\Facades\Storage;

class RemovedorDeSerie
{
    private function removerEp(Temporada $temporada): void
    {
        $temporada->episodios->each(function(Episodio $ep){
            $ep->delete();
        });
    }

    private function removerTemp(Serie $serie): void
    {
        $serie->temporadas->each(function(Temporada $temporada){
            $this->removerEp($temporada);
            $temporada->delete();
        });
    }

    public function removerSerie(int $idSerie): string
    {
         //devido ao relacionamento deve-se realizar o destroy em cascata,
        //neste caso será realizado manualmente.

        $nomeSerie = '';
        DB::transaction(function() use ($idSerie, &$nomeSerie){
            $serie = Serie::find($idSerie);
            $nomeSerie = $serie->nome;
            $this->removerTemp($serie);

            $serie->delete();

            if(!is_null($serie->capa)){
                Storage::delete($serie->capa);
            }
        });

        return $nomeSerie;

    }
}
