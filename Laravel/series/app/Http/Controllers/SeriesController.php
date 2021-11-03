<?php


namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Mail\NovaSerie;
use App\serie;
use App\User;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Services\RemovedorDeSerie;
use Illuminate\Support\Facades\Mail;

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

        //envio de email ao cadastrar serie
        //envio para todos usuários cadastrados na aplicação
        $users = User::all();

        foreach ($users as $user){
            $email = new NovaSerie($request->nome, $request->temporadas, $request->episodios);
            $email->subject = 'Nova Serie Cadastrada';
            Mail::to($user)->send($email);
            sleep(5); //incluindo delay entre envio de cada email para não haver bloqueio de spam
        }

        $request->session()->flash('mensagem', "Série ({$serie->nome}) com suas temporadas e episódios criados com sucesso!");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série ($nomeSerie) excluída com sucesso!");

        return redirect()->route('listar_series');
    }

    public function editaNome(Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($request->id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}
