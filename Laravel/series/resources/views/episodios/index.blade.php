@extends('layout')

@section('cabecalho')
Episódios da Temporada <strong>{{$temporadaNum}}</strong> de <strong>{{$serie}}</strong>
@endsection

@section('conteudo')
    <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
        @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="form-check-label">Episódio {{$episodio->numero}}</span>
            <input class="greatCheck" type="checkbox" name="episodios[]" value="{{$episodio->numero}}">

        </li>
        @endforeach
    </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection
