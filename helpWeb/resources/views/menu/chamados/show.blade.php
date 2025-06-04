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
        background-color: #ce1b1b !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color: #9a1313 !important;
            color: #fff !important;
        }
    }
    
    .btn_voltar{
        background-color: #4e59dd !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color: #2e347b !important;
            color: #fff !important;
        }
    }

    .btn-envia, .btn_voltar{
        width: 40%;
    }

    .botoes {
        display: flex;
        justify-content: space-evenly;
        width: 40%;
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

            <label for="cod_tecnico" class="form-label">Técnico Responsável</label>
            <select class="form-select" id="cod_tecnico" name="cod_tecnico" disabled>
                <option selected disabled>Selecione um técnico...</option>

                @foreach($tecnicos as $tecnico)


                    <option {{ $tecnico->id == $chamado->cod_tecnico ? "selected" : "" }}  value="{{ $tecnico->id }}">{{ $tecnico->nome_resumido }}</option>

                @endforeach

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="cod_solicitante" class="form-label">Solicitante</label>
            <select class="form-select" id="cod_solicitante" name="cod_solicitante" disabled>
                <option selected disabled>Selecione um solicitante...</option>

                @foreach($usuarios as $usuario)

                    <option {{ $usuario->id == $chamado->cod_solicitante ? "selected" : "" }} value="{{ $usuario->id }}">{{ $usuario->nome_resumido }}</option>

                @endforeach

            </select>

        </div>

        <div class="mb-3" style="width: 48%">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" disabled>
                <option disabled <?= is_null($chamado->status) ? 'selected' : '' ?>>Selecione um status...</option>
                
                <option value="1" <?= $chamado->status == 1 ? 'selected' : '' ?>>Novo chamado</option>
                <option value="2" <?= $chamado->status == 2 ? 'selected' : '' ?>>Em Atendimento</option>
                <option value="3" <?= $chamado->status == 3 ? 'selected' : '' ?>>Em Validação</option>
                <option value="4" <?= $chamado->status == 4 ? 'selected' : '' ?>>Finalizado</option>

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="categoria" class="form-label">Categoria</label>

            <select class="form-select" id="categoria" name="categoria" disabled>
                <option selected disabled>Selecione uma categoria...</option>

                @foreach($categorias as $c)

                    <option {{ $c->id == $chamado->categoria ? "selected" : "" }} value="{{ $c->id }}">{{$c->nome}}</option>

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

        <input type="hidden" name="cod_usuario_inc" value="1">

        <div class="botoes">

            <button type="submit" class="btn btn-envia mt-3">Excluir Chamado</button>
            <a href="{{ url()->previous() }}" class="btn btn_voltar mt-3">Voltar</a>

        </div>

    </form>
</div>

@endsection