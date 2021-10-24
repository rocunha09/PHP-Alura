<?php


namespace App\Http\Controllers;

use App\Episodio;
use App\serie;
use App\Temporada;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Services\RemovedorDeSerie;

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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->temporadas,
            $request->episodios);

        $request->session()->flash('mensagem', "Série ({$serie->nome}) com suas temporadas e episódios criados com sucesso!");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série ($nomeSerie) excluída com sucesso!");

        return redirect()->route('listar_series');
    }

}
