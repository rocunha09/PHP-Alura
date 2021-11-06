@extends('layout')

@section('cabecalho')
Temporadas de <strong>{{$serie->nome}}</strong>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{$serie->capa_url}}" target="_blank">
            <img id="img-capa" src="{{$serie->capa_url}}" alt="capa-serie" class="img-thumbnail " height="500px" width="400px">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3 mb-5">
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
        </div>
    </div>

@endsection

