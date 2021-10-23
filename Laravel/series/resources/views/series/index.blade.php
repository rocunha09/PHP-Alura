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

<a href="{{route('form_criar_serie')}}" class="btn btn-primary mb-2">Adicionar</a>
<ul class="list-group d-flex">

    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->nome}}
            <span class="d-flex">

                <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-3"><i class="material-icons">launch</i></a>

                <form action="/series/{{$serie->id}}" method="post"  onsubmit="return confirm('Deseja Excluir a série {{addslashes($serie->nome)}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm "> <i class="material-icons">delete_forever</i>
                    </button>
                </form>
            </span>
        </li>
    @endforeach

</ul>
@endsection

