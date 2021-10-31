<?php


namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;

abstract class BaseController
{
    protected $classe;

    public function index(Request $request)
    {
        //calculando offset, ele representa o ponto de partida da listagem
        $offset = ($request->page -1) * $request->per_page;
        return $this->classe::query()
            ->offset($offset) // ponto de partida
            ->limit($request->per_page) //quantidade de itens por página
            ->get();
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if(is_null($recurso)){
            return response()
                ->json('', 204);
        }

        return response()
            ->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);

        if(is_null($recurso)){
            return response()
                ->json([
                    'erro' =>'Recurso não encontrado'
                ], 404);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return response()
            ->json($recurso);
    }

    public function destroy(int $id, Request $request)
    {
        $qtdSrecursosRemovidas = $this->classe::destroy($id);

        if($qtdSrecursosRemovidas === 0){
            return response()
                ->json([
                    'erro' =>'Recurso não encontrado'
                ], 404);
        }

        return response()
            ->json('', 204);
    }
}
