@extends('layout')

@section('cabecalho')
Lista de Séries
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="/series/criar" class="btn btn-primary mb-2">Adicionar</a>
<ul class="list-group d-flex">

    @foreach($series as $serie)
        <li class="list-group-item">{{$serie->nome}}

            <form action="/series/{{$serie->id}}" method="post" class="justify-content-end" onsubmit="return confirm('Deseja Excluir a série {{addslashes($serie->nome)}}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>

        </li>
    @endforeach

</ul>
@endsection

