<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        //$series = Serie::all(); //retorna todos as series

        $series = Serie::query()->orderBy('nome')->get(); //retorna todas as series ordenadas por nome
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', [
           'series' => $series,
            'mensagem' => $mensagem
       ]);

    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $serie = Serie::create([
            'nome' => $nome
        ]);

        $qtdTemporadas = $request->temporadas;
        $episodios = $request->episodios;
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

        $request->session()->flash('mensagem', "Série ({$nome}) com suas temporadas e episódios criados com sucesso!");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série excluída com sucesso!");

        return redirect()->route('listar_series');
    }

}
