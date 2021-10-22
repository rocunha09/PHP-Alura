<?php


namespace App\Http\Controllers;


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

    public function store(Request $request)
    {
        $nome = $request->nome;

        //$serie = new Serie();
        //$serie->nome = $nome;
        //$serie->save();

        //substitui a forma realizada acima.
        Serie::create([
            'nome' => $nome
        ]);

        $request->session()->flash('mensagem', "Série ({$nome}) criada com sucesso!");

        return redirect('/series');
    }

}
