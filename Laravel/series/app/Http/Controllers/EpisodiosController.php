<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $serie = Serie::find($temporada->serie_id);

        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'temporadaNum'=> $temporada->numero,
            'temporadaId' => $temporada->id,
            'serie' => $serie->nome
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;

        //itera sobre a lista de episodios marcando como assistido os que retornarem true(se estiverem na lista de assistidos o in_array() retorna true.
        $temporada->episodios->each(function(Episodio $episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });

        //realizando o push em temporada pode-se realizar um único acesso ao banco,
        //do contrário poderia ser feito com transaction, ou iterando sobre a lista de episodios...
        $temporada->push();

        $request->session()->flash('mensagem', "Episódio(s) marcado(s) como assistido(s) com sucesso!");

        //return redirect()->route(`/temporadas/${temporada->id}/episodios`);
    }
}
