@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>

            <div class="col col-2">
                <label for="nome">Nº de temporadas:</label>
                <input type="number" id="temporadas" name="temporadas" class="form-control">
            </div>

            <div class="col col-2">
                <label for="nome">Nº de episódios:</label>
                <input type="number" id="episodios" name="episodios" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Salvar</button>

    </form>
@endsection

