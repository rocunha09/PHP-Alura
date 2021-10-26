<?php

namespace App\Http\Controllers;

use App\serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas =$serie->temporadas;
        $epAssistidosPorTemporada = [];

        foreach($temporadas as $temporada){
            $numAssistidos =  0;
            foreach ($temporada->episodios as $episodio){
                if($episodio->assistido == true){
                    $numAssistidos++;
                }

            }
            $epAssistidosPorTemporada[] .= $numAssistidos;
        }


        return view('temporadas.index', [
            'serie' => $serie,
            'temporadas' => $temporadas,
            'numAssistidos' => $epAssistidosPorTemporada
        ]);

    }
}
