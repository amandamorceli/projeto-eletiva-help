@extends('help')

<style>
    input[type='text'],
    select,
    textarea {
        box-shadow: 0px 0.5px 10px 0px #d1d1d1;
    }

    .container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }

    .btn-envia {
        background-color: #4e59dd !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color: #2e347b !important;
            color: #fff !important;
        }
    }
</style>

@section('conteudo')

<div class="form-container">

    <h3 class="text-left text-dark ms-3">📄 Visualizar Chamado</h3>

    <hr>

    <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="/chamados/{{ $chamado->id }}">
        @csrf
        @method('DELETE')

        <div class="mb-3" style="width: 48%">

            <label for="n_cod_tecnico" class="form-label">Técnico Responsável</label>
            <select class="form-select" id="n_cod_tecnico" name="n_cod_tecnico" disabled>
                <option selected disabled>Selecione um técnico...</option>

                @foreach($tecnicos as $tecnico)


                    <option {{ $tecnico->id == $chamado->n_cod_tecnico ? "selected" : "" }}  value="{{ $tecnico->id }}">{{ $tecnico->c_nome_resumido }}</option>

                @endforeach

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="n_cod_solicitante" class="form-label">Solicitante</label>
            <select class="form-select" id="n_cod_solicitante" name="n_cod_solicitante" disabled>
                <option selected disabled>Selecione um solicitante...</option>

                @foreach($usuarios as $usuario)

                    <option {{ $usuario->id == $chamado->n_cod_solicitante ? "selected" : "" }} value="{{ $usuario->id }}">{{ $usuario->c_nome_resumido }}</option>

                @endforeach

            </select>

        </div>

        <div class="mb-3" style="width: 48%">
            <label for="f_status" class="form-label">Status</label>
            <select class="form-select" id="f_status" name="f_status" disabled>
                <option selected disabled>Selecione um status...</option>
                
                <option value="1">Novo chamado</option>
                <option value="2">Em Atendimento</option>
                <option value="3">Em Validação</option>
                <option value="4">Finalizado</option>

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="n_categoria" class="form-label">Categoria</label>

            <select class="form-select" id="n_categoria" name="n_categoria" disabled>
                <option selected disabled>Selecione uma categoria...</option>

                @foreach($categorias as $c)

                    <option {{ $c->id == $chamado->n_categoria ? "selected" : "" }} value="{{ $c->id }}">{{$c->nome}}</option>

                @endforeach

            </select>

        </div>

        <div class="mb-3" style="width: 98%">

            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $chamado->titulo }}" disabled>

        </div>

        <div class="mb-3" style="width: 98%">

            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" disabled> {{ $chamado->descricao }}</textarea>

        </div>

        <input type="hidden" name="n_cod_usuario_inc" value="1">

        <button type="submit" class="btn btn-envia mt-3">Excluir Chamado</button>

    </form>
</div>

@endsection