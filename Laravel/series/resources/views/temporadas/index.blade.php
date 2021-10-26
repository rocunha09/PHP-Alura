@extends('layout')

@section('cabecalho')
Temporadas de <strong>{{$serie->nome}}</strong>
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/temporadas/{{$temporada->id}}/episodios">
            Temporada {{$temporada->numero}}
            </a>
            <span class="badge badge-secondary">
                <!--num de ep assistidos por temporada / total de ep por temporada-->
                {{ $temporada->getEpisodiosAssistidos()->count() }} / {{$temporada->episodios->count()}}
            </span>
        </li>
        @endforeach
    </ul>
@endsection
