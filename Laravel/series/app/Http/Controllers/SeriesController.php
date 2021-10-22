<?php


namespace App\Http\Controllers;


use App\serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
            $series = Serie::all();

           return view('series.index', [
               'series' => $series
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
    }

}
