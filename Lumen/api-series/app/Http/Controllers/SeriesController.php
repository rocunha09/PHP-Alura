<?php


namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(Serie::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);

        if(is_null($serie)){
            return response()
                ->json('', 204);
        }

        return response()
            ->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        //poderia ser feito desta forma:
        //$serie->nome = $request->nome;

        if(is_null($serie)){
            return response()
                ->json([
                    'erro' =>'Recurso não encontrado'
                ], 404);
        }

        //pode ser feito desta forma, que vai pegar todos dados que vierem da request:
        $serie->fill($request->all()); //como na classe só  nome é fillable, se vier algo a mais será ignorado.
        $serie->save();

        return response()
            ->json($serie);
    }

    public function destroy(int $id, Request $request)
    {
        /*
         * Para remover uma Serie, foi chamado o método estático destroy, que recebe como parâmetro os IDs dos
         * registros a serem removidos do banco de dados.
         *
         * ele retorna o número de registros afetados
         * */
        $qtdSseriesRemovidas = Serie::destroy($id);

        if($qtdSseriesRemovidas === 0){
            return response()
                ->json([
                    'erro' =>'Recurso não encontrado'
                ], 404);
        }

        return response()
            ->json('', 204);
    }
}
