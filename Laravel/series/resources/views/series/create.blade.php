@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    <form action="/series/salvar" method="post">
        <div class="form-group">
            <label for="descricao">Nome:</label>
            <input type="text" name="descricao" class="form-control">
            <button class="btn btn-primary mt-2">Salvar</button>
        </div>
    </form>
@endsection

