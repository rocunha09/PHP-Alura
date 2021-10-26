@extends('layout')

@section('cabecalho')
Lista de Séries
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

<a href="{{route('form_criar_serie')}}" class="btn btn-primary mb-2">Adicionar</a>
<ul class="list-group d-flex">

    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{$serie->nome}}</span>

            <!--input hidden para alterar nome da serie-->
            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    @csrf
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="material-icons">check</i>
                    </button>
                </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-3" id="me-{{ $serie->id }}" onclick="toggleInput({{ $serie->id }})">
                    <i class="material-icons">edit</i>
                </button>

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


    <script>
        function toggleInput(serieId){
            var elementoNome = document.getElementById(`nome-serie-${serieId}`)
            var elementoForm = document.getElementById(`input-nome-serie-${serieId}`)
            var me = document.getElementById(`me-${serieId}`)

            if(elementoForm.hidden === true){
                elementoNome.hidden = true
                elementoForm.hidden = false
                me.classList.remove('btn-info')
                me.classList.add('btn-warning')

            }else{
                elementoNome.hidden = false
                elementoForm.hidden = true
                me.classList.remove('btn-warning')
                me.classList.add('btn-info')
            }

        }

        function editarSerie(serieId){
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            const token = document.querySelector('input[name="_token"]').value;
           console.log(nome)
            console.log(token)



            formData.append('nome', nome);
            formData.append('_token', token);

            const url = `/series/${serieId}/editaNome`;
            console.log(url)

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(()=>{
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });



        }
    </script>
@endsection

