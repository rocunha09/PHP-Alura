@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control">
            <button class="btn btn-primary mt-2">Salvar</button>
        </div>
    </form>
@endsection

